<?php

namespace Tests\Browser;

use App\Set;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SetsPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_shows_the_sets_index_page()
    {
        $this->browse(function (Browser $browser) {
            $set = factory(Set::class)->create();

            $browser->visit('/sets')
                    ->assertSee('Create a new set')
                    ->assertSee($set->name);
        });
    }
}
