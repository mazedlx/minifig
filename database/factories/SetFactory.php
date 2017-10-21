<?php

use Faker\Generator as Faker;

$factory->define(App\Set::class, function (Faker $faker) {
    $file = $faker->image(storage_path('app/public/images'), 350, 120);

    $file = "images/" . (explode('/', $file)[count(explode('/', $file)) - 1]);
    return [
        'name' => $faker->word,
        'number' => $faker->randomNumber(5),
        'filename' => $file,
    ];
});
