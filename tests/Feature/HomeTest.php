<?php

namespace Tests\Feature;

use App\Image;
use App\Minifig;
use App\Set;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_shows_the_main_page()
    {
        factory(Set::class)->create();
        factory(Minifig::class)->create();
        factory(Image::class)->create();

        $this->get('/')->assertStatus(200);
    }
}
