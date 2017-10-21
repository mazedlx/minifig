<?php

use Faker\Generator as Faker;

$factory->define(App\Minifig::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'set_id' => function () {
            return factory('App\Set')->create()->id;
        },
    ];
});
