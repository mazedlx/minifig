<?php

namespace Tests\Feature;

use App\Set;
use App\User;
use App\Minifig;
use Tests\TestCase;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MinifigTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_guest_can_view_all_minifigs()
    {
        $minifigs = factory(Minifig::class, 5)->create();

        $response = $this->get('/minifigs');

        $response->assertStatus(200);
    }

    /** @test */
    function a_guest_can_view_a_single_minifig()
    {
        $minifig = factory(Minifig::class)->create();

        $response = $this->get("/minifigs/{$minifig->id}");

        $response->assertStatus(200);
    }

    /** @test */
    function a_guest_cant_add_a_new_minifig()
    {
        $minifig = factory(Minifig::class)->make([
            'name' => 'New Set',
        ]);

        $response = $this->post('/minifigs', $minifig->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseMissing('minifigs', [
            'name' => 'New Set',
        ]);
    }

    /** @test */
    function a_guest_cant_view_the_edit_dialog()
    {
        $minifig = factory(Minifig::class)->create();

        $response = $this->get("/minifigs/{$minifig->id}/edit");

        $response->assertStatus(302);
    }

    /** @test */
    function a_guest_cant_edit_a_minifig()
    {
        $minifig = factory(Minifig::class)->create([
            'name' => 'Old name',
        ]);

        $response = $this->patch("/minifigs/{$minifig->id}", ['name' => 'New name', 'set_id' => $minifig->set_id]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('minifigs', [
            'name' => 'Old name',
        ]);
    }

    /** @test */
    function a_guest_cant_delete_a_minifig()
    {
        $minifig = factory(Minifig::class)->create([
            'name' => 'Old name',
        ]);

        $response = $this->delete("/minifigs/{$minifig->id}");

        $response->assertStatus(302);
        $this->assertDatabaseHas('minifigs', [
            'name' => 'Old name',
        ]);
    }

    /** @test */
    function a_user_can_add_a_new_minifig()
    {
        $user = factory(User::class)->create();
        $minifig = factory(Minifig::class)->make([
            'name' => 'New Minifig',
        ]);

        $response = $this->actingAs($user)->post('/minifigs', $minifig->toArray());
        $this->assertDatabaseHas('minifigs', ['name' => 'New Minifig']);
    }

    /** @test */
    function a_user_can_edit_a_minifig()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->create();
        $minifig = factory(Minifig::class)->create([
            'name' => 'Old Minifig',
        ]);

        $response = $this->actingAs($user)->patch("/minifigs/{$minifig->id}", [
            'name' => 'New Minifig',
            'set_id' => $set->id,
        ]);

        $this->assertDatabaseHas('minifigs', [
            'name' => 'New Minifig',
            'set_id' => $set->id,
        ]);
    }

    /** @test */
    function minifig_image_is_uploaded_if_included()
    {
        Storage::fake('public');
        $fileA = File::image('minifig_image_a.png', 300, 150);
        $fileB = File::image('minifig_image_b.png', 300, 150);
        $fileC = File::image('minifig_image_c.png', 300, 150);
        $user = factory(User::class)->create();

        $minifig = factory(Minifig::class)->make([
            'files' => [
                $fileA,
                $fileB,
                $fileC,
            ],
        ]);

        $response = $this->actingAs($user)->post('/minifigs', $minifig->toArray());

        tap(Minifig::first(), function ($minifig) use ($fileA, $fileB, $fileC) {
            $minifig->images->each(function ($image) {
                $this->assertNotNull($image->filename);
                Storage::disk('public')->assertExists($image->filename);

            });

            $this->assertFileEquals(
                $fileA->getPathname(),
                Storage::disk('public')->path($minifig->images()->take(1)->first()->filename)
            );

            $this->assertFileEquals(
                $fileB->getPathname(),
                Storage::disk('public')->path($minifig->images()->skip(1)->take(1)->first()->filename)
            );

            $this->assertFileEquals(
                $fileC->getPathname(),
                Storage::disk('public')->path($minifig->images()->skip(2)->take(1)->first()->filename)
            );

            $this->assertEquals(3, $minifig->images->count());
        });

    }

    /** @test */
    function when_a_minifig_gets_deleted_its_images_get_also_deleted()
    {
        Storage::fake('public');
        $fileA = File::image('minifig_image_a.png', 150, 300);
        $fileB = File::image('minifig_image_b.png', 150, 300);
        $fileC = File::image('minifig_image_c.png', 150, 300);
        $user = factory(User::class)->create();
        $set = factory(Set::class)->create();

        $response = $this->actingAs($user)->post('/minifigs', [
            'name' => 'New minifig',
            'set_id' => $set->id,
            'files' => [
                $fileA,
                $fileB,
                $fileC,
            ],
        ]);

        $minifig = Minifig::first();
        $images = $minifig->images;

        $images->each(function ($image) {
            Storage::disk('public')->assertExists($image->filename);
        });

        $response = $this->actingAs($user)->delete("/minifigs/{$minifig->id}");

        $this->assertDatabaseMissing('minifigs', ['id' => $minifig->id]);

        $images->each(function ($image) {
            Storage::disk('public')->assertMissing($image->filename);
        });
    }
}
