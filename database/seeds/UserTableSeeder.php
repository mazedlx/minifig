<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
        	array(
        		'name' 	=> 'Christian Leo-Pernold',
        		'email'	=> 'mazedlx@gmail.com',
                'password' => '$2y$10$tbop3qQXjW85JuhAUTBTSOjLZ/hVQ3amxzFeIeaG5A7CREtG0r4Fa'
        	)
        );
    }
}
