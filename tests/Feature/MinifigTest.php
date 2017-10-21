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
        $file = File::image('minifig_image.png', 300, 150);
        $user = factory(User::class)->create();

        $minifig = factory(Minifig::class)->make([
            'files' => [
                $file,
            ],
        ]);

        $response = $this->actingAs($user)->post('/minifigs', $minifig->toArray());

        tap(Minifig::first(), function ($minifig) use ($file) {
            $this->assertNotNull($minifig->images()->first()->filename);
            Storage::disk('public')->assertExists($minifig->images()->first()->filename);
            $this->assertFileEquals(
                $file->getPathname(),
                Storage::disk('public')->path($minifig->images()->first()->filename)
            );
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
