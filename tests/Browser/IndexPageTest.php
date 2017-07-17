<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IndexPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_shows_the_main_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Minifig');
        });
    }
}
