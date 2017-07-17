<?php

namespace Tests\Browser;

use App\Minifig;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MinifigPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_shows_the_minifigs_index_page()
    {
        $this->browse(function (Browser $browser) {
            $minifig = factory(Minifig::class)->create();
            $browser->visit('/minifigs')
                    ->assertSee('Create a new minifig')
                    ->assertSee($minifig->name);
        });
    }
}
