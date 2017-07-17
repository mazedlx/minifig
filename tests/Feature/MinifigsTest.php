<?php

namespace Tests\Feature;

use App\Minifig;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MinfigsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_returns_the_minifigs_page()
    {
        $this->get('/minifigs')
            ->assertStatus(200);
    }

    /** @test */
    function it_shows_a_minifigs_details()
    {
        $minifig = factory(Minifig::class)->create();
        $this->get('/minifigs/' . $minifig->id)
             ->assertStatus(200)
             ->assertSee($minifig->name);
    }

    /** @test */
    function it_creates_a_minifig()
    {
        $user = factory(User::class)->create();
        $minifig = factory(Minifig::class)->make();
        $this->actingAs($user);

        $this->post('/minifigs', $minifig->toArray());

        $this->assertDatabaseHas('minifigs', ['name' => $minifig->name]);
    }

    /** @test */
    function it_edits_a_minifig()
    {
        $user = factory(User::class)->create();
        $minifig = factory(Minifig::class)->create();
        $minifigEdit = factory(Minifig::class)->make();
        $this->actingAs($user);

        $this->patch('/minifigs/' . $minifig->id, $minifigEdit->toArray());

        $this->assertDatabaseHas(
            'minifigs',
            [
                'id' => $minifig->id,
                'name' => $minifigEdit->name
            ]
        );
    }

    /** @test */
    function it_deletes_a_minifig()
    {
        $user = factory(User::class)->create();
        $minifig = factory(Minifig::class)->create();
        $this->actingAs($user);
        $this->delete('/minifigs/' . $minifig->id);

        $this->assertDatabaseMissing('minifigs', ['id' => $minifig->id]);
    }

    /** @test */
    function guests_cant_edit_minifigs()
    {
        $minifig = factory(Minifig::class)->create();

        $this->get('/minifigs/' . $minifig->id . '/edit')->assertStatus(302);
    }
}
