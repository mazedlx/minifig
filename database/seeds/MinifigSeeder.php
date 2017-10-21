<?php

use Illuminate\Database\Seeder;

class MinifigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(App\Minifig::class, 20)->create();

        App\Minifig::all()->each(function ($minifig) use ($faker) {
            $file = $faker->image(storage_path('app/public/images'), 350, 120);
            $file = "images/" . (explode('/', $file)[count(explode('/', $file)) - 1]);

            $image = App\Image::create([
                'minifig_id' => $minifig->id,
                'filename' => $file,
            ]);

            $minifig->images()->save($image);
        });
    }
}
