<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'minifig_id' => function () {
            return factory('App\Minifig')->create()->id;
        },
        'filename' => $faker->word,
    ];
});
