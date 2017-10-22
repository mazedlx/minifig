<?php

namespace Tests\Feature;

use App\Set;
use App\User;
use Tests\TestCase;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_guest_can_view_all_sets()
    {
        $sets = factory(Set::class, 5)->create();

        $response = $this->get('/sets');

        $response->assertStatus(200);
    }

    /** @test */
    function a_guest_can_view_a_single_set()
    {
        $set = factory(Set::class)->create();

        $response = $this->get("/sets/{$set->id}");

        $response->assertStatus(200);
    }

    /** @test */
    function a_guest_cant_add_a_new_set()
    {
        $set = factory(Set::class)->make([
            'name' => 'New Set',
            'number' => '12345',
        ]);

        $response = $this->post('/sets', $set->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseMissing('sets', [
            'name' => 'New Set',
            'number' => '12345'
        ]);
    }

    /** @test */
    function a_guest_cant_view_the_edit_dialog()
    {
        $set = factory(Set::class)->create();

        $response = $this->get("/sets/{$set->id}/edit");

        $response->assertStatus(302);
    }

    /** @test */
    function a_guest_cant_edit_a_set()
    {
        $set = factory(Set::class)->create([
            'name' => 'Old name',
            'number' => '12345',
        ]);

        $response = $this->patch("/sets/{$set->id}", ['name' => 'New name', 'number' => '99999']);

        $response->assertStatus(302);
        $this->assertDatabaseHas('sets', [
            'name' => 'Old name',
            'number' => '12345',
        ]);
    }

    /** @test */
    function a_guest_cant_delete_a_set()
    {
        $set = factory(Set::class)->create([
            'name' => 'Old name',
            'number' => '12345',
        ]);

        $response = $this->delete("/sets/{$set->id}");

        $response->assertStatus(302);
        $this->assertDatabaseHas('sets', [
            'name' => 'Old name',
            'number' => '12345',
        ]);
    }

    /** @test */
    function a_user_can_add_a_new_set()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->make([
            'name' => 'New Set',
            'number' => '12345',
        ]);

        $response = $this->actingAs($user)->post('/sets', $set->toArray());
        $this->assertDatabaseHas('sets', ['name' => 'New Set', 'number' => '12345']);
    }

    /** @test */
    function a_user_can_edit_a_set()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->create([
            'name' => 'Old Set',
            'number' => '12345',
        ]);

        $response = $this->actingAs($user)->patch("/sets/{$set->id}", [
            'name' => 'New Set',
            'number' => '99999',
        ]);

        $this->assertDatabaseHas('sets', [
            'name' => 'New Set',
            'number' => '99999',
        ]);
    }

    /** @test */
    function set_image_is_uploaded_if_included()
    {
        Storage::fake('public');
        $file = File::image('set_image.png', 150, 300);
        $user = factory(User::class)->create();

        $set = factory(Set::class)->make([
            'file' => $file,
        ]);

        $response = $this->actingAs($user)->post('/sets', $set->toArray());

        tap(Set::first(), function ($set) use ($file) {
            $this->assertNotNull($set->filename);
            Storage::disk('public')->assertExists($set->filename);
            $this->assertFileEquals(
                $file->getPathname(),
                Storage::disk('public')->path($set->filename)
            );
        });
    }

    /** @test */
    function when_a_set_gets_deleted_its_images_get_also_deleted()
    {
        Storage::fake('public');
        $file = File::image('set_image.png', 150, 300);
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/sets', [
            'name' => 'New set',
            'number' => '12345',
            'file' => $file,
        ]);

        $set = Set::first();

        $response = $this->actingAs($user)->delete("/sets/{$set->id}");

        $this->assertDatabaseMissing('sets', ['id' => $set->id]);
        Storage::disk('public')->assertMissing($set->filename);
    }
}
