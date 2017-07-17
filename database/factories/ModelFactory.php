<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Set::class, function (Faker\Generator $faker ) {
    return [
        'name' => $faker->word,
        'number' => $faker->randomNumber(5),
    ];
});

$factory->define(App\Minifig::class, function (Faker\Generator $faker ) {
    return [
        'name' => $faker->word,
        'set_id' => function () {
            return factory('App\Set')->create()->id;
        },
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker ) {
    return [
        'minifig_id' => function () {
            return factory('App\Minifig')->create()->id;
        },
        'filename' => $faker->word,
    ];
});
