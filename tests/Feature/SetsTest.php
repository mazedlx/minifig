<?php

use App\Set;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;

class SetsTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function it_returns_the_sets_page()
    {
        $this->get('/sets')->assertStatus(200);
    }

    /** @test */
    function it_shows_a_sets_details()
    {
        $set = factory(Set::class)->create();
        $this->get('/sets/' . $set->id)
             ->assertStatus(200)
             ->assertSee($set->name);
    }

    /** @test */
    function it_creates_a_set()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->make();

    	$this->actingAs($user);

        $this->post('/sets', $set->toArray());

        $this->assertDatabaseHas('sets', ['name' => $set->name]);
    }

    /** @test */
    function it_edits_a_set()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->create();
        $setEdit = factory(Set::class)->make();

        $this->actingAs($user);
        $this->patch('/sets/' . $set->id, $setEdit->toArray());

        $this->assertDatabaseHas(
            'sets',
            [
                'id' => $set->id,
                'name' => $setEdit->name
            ]
        );
    }

    /** @test */
    function it_deletes_a_set()
    {
        $user = factory(User::class)->create();
        $set = factory(Set::class)->create();

        $this->actingAs($user);
        $this->delete('/sets/' . $set->id);

        $this->assertDatabaseMissing('sets', ['id' => $set->id]);
    }

    /** @test */
    function guests_cant_edit_sets()
    {
        $set = factory(Set::class)->create();

        $this->get('/sets/' . $set->id . '/edit')->assertStatus(302);
    }
}
