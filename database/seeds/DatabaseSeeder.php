 472 Bytes
<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(SetsTableSeeder::class);
        $this->call(MinifigsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        Model::reguard();
    }
}