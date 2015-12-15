<?php

use Illuminate\Database\Seeder;

class SetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sets')->insert([
            'id' => 9999, 
            'name' => 'Kein Set', 
            'number' => 0, 
            'filename' => 'no_set.jpg'
            ]);
        DB::table('sets')->insert([
            'id' => '2', 
            'name' => 'Death Star', 
            'number' => 10188, 
            'filename' => '10188.png'
        ]);
        DB::table('sets')->insert([
            'id' => '3', 
            'name' => 'Cloud City', 
            'number' => 10123,
            'filename' => '10123.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '4', 
            'name' => 'Super Star Destroyer', 
            'number' => 10221,
            'filename' => '10221.png'
        ]);
        DB::table('sets')->insert([
            'id' => '5', 
            'name' => 'Ewok Village', 
            'number' => 10236,
            'filename' => '10236.png'
        ]);
        DB::table('sets')->insert([
            'id' => '6', 
            'name' => 'Millennium Falcon', 
            'number' => 7965, 
            'filename' => '7965.png'
        ]);
        DB::table('sets')->insert([
            'id' => '7', 
            'name' => 'TIE Advanced Prototype', 
            'number' => 75082, 
            'filename' => '75082.png'
        ]);
        DB::table('sets')->insert([
            'id' => '8', 
            'name' => 'TIE Fighter', 
            'number' => 9492, 
            'filename' => '9492.png'
        ]);
        DB::table('sets')->insert([
            'id' => '9', 
            'name' => 'TIE Interceptor', 
            'number' => 75031, 
            'filename' => '75031.png'
        ]);
        DB::table('sets')->insert([
            'id' => '10', 
            'name' => 'The Big Bang Theory', 
            'number' => 21302, 
            'filename' => '21302.png'
        ]);
        DB::table('sets')->insert([
            'id' => '11', 
            'name' => 'Wedding Favor Set', 
            'number' => 853340, 
            'filename' => '853340.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '12', 
            'name' => 'Iron Man vs. The Mandarin: Ultimate Showdown', 
            'number' => 76008, 
            'filename' => '76008.png'
        ]);
        DB::table('sets')->insert([
            'id' => '13', 
            'name' => 'Ghostbusters Ecto-1', 
            'number' => 21108, 
            'filename' => '21108.png'
        ]);
        DB::table('sets')->insert([
            'id' => '14', 
            'name' => 'Good Neighbors ar Bikini Bottom', 
            'number' => 3834, 
            'filename' => '3834.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '16', 
            'name' => 'Star Wars Advent Calendar', 
            'number' => 9509, 
            'filename' => '9506.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '17', 
            'name' => 'Star Wars Advent Calendar', 
            'number' => 75023, 
            'filename' => '75023.png'
        ]);
        DB::table('sets')->insert([
            'id' => '18', 
            'name' => 'Star Wars Advent Calendar', 
            'number' => 75056, 
            'filename' => '75056.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '19', 
            'name' => 'Clone Troopers vs. Droidekas',
            'number' => 75000, 
            'filename' => '75000.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '20', 
            'name' => 'The Tower of Orthanc', 
            'number' => 10237,
            'filename' => '10237.png'
        ]);
        DB::table('sets')->insert([
            'id' => '21', 
            'name' => 'Battle at the Black Gate', 
            'number' => 79007, 
            'filename' => '79007.png'
        ]);
        DB::table('sets')->insert([
            'id' => '22', 
            'name' => 'City Advent Calendar', 
            'number' => 60024, 
            'filename' => '60024.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '23', 
            'name' => 'Kingdoms Advent Calendar', 
            'number' => 7952, 
            'filename' => '7952.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '24', 
            'name' => 'Minifigures Series 7', 
            'number' => 8831, 
            'filename' => '8831.png'
        ]);
        DB::table('sets')->insert([
            'id' => '25', 
            'name' => 'Minifigures Series 8', 
            'number' => 8833, 
            'filename' => '8833.png'
        ]);
        DB::table('sets')->insert([
            'id' => '26', 
            'name' => 'Minifigures Series 9', 
            'number' => 71000, 
            'filename' => '71000.png'
        ]);
        DB::table('sets')->insert([
            'id' => '27', 
            'name' => 'Minifigures Series 11', 
            'number' => 71002, 
            'filename' => '71002.png'
        ]);
        DB::table('sets')->insert([
            'id' => '28', 
            'name' => 'Star Wars Yoda Minifigure Watch', 
            'number' => 2856130, 
            'filename' => '2856130.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '29', 
            'name' => 'AT-ST & Endor', 
            'number' => 9679, 
            'filename' => '9679.png'
        ]);
        DB::table('sets')->insert([
            'id' => '30', 
            'name' => 'B-wing Starfighter & Planet Endor', 
            'number' => 75010, 
            'filename' => '75010.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '31', 
            'name' => 'Naboo Starfighter & Naboo', 
            'number' => 9674, 
            'filename' => '9674.jpg'
        ]);
        DB::table('sets')->insert([
            'id' => '32', 
            'name' => 'Elite Clone Trooper & Commando Droid Battle Pack', 
            'number' => 9488, 
            'filename' => '9488.png'
        ]);
        DB::table('sets')->insert([
            'id' => '33', 
            'name' => 'Twin-Pod Cloud Car & Bespin', 
            'number' => 9678, 
            'filename' => '9678.png'
        ]);
        DB::table('sets')->insert([
            'id' => '34', 
            'name' => 'Sebulba’s Podracer & Tatooine', 
            'number' => 9675, 
            'filename' => '9675.png'
        ]);
        DB::table('sets')->insert([
            'id' => '35', 
            'name' => 'The Mystery Machine', 
            'number' => 75902, 
            'filename' => '75902.png'
        ]);
        DB::table('sets')->insert([
            'id' => '36', 
            'name' => 'Knowhere Escape Mission', 
            'number' => 76020, 
            'filename' => '76020.png'
        ]);
        DB::table('sets')->insert([
            'id' => '37', 
            'name' => 'The Farm', 
            'number' => 21114, 
            'filename' => '21114.png'
        ]);
        DB::table('sets')->insert([
            'id' => '38', 
            'name' => 'The Cave', 
            'number' => 21113, 
            'filename' => '21113.png'
        ]);
        DB::table('sets')->insert([
            'id' => '39', 
            'name' => 'The First Night', 
            'number' => 21115, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 16.47.46.png'
        ]);
        DB::table('sets')->insert([
            'id' => '40', 
            'name' => 'Gollum Fun Pack', 
            'number' => 71218, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 16.48.40.png'
        ]);
        DB::table('sets')->insert([
            'id' => '41', 
            'name' => 'Vulture Droid', 
            'number' => 75073, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 16.51.06.png'
        ]);
        DB::table('sets')->insert([
            'id' => '42', 
            'name' => 'ARC-170 Starfighter', 
            'number' => 75072, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 16.52.47.png'
        ]);
        DB::table('sets')->insert([
            'id' => '43', 
            'name' => 'The Mine', 
            'number' => 4204, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 16.55.53.png'
        ]);
        DB::table('sets')->insert([
            'id' => '44', 
            'name' => 'Trick Or Treat Halloween Set', 
            'number' => 40122, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 17.01.20.png'
        ]);
        DB::table('sets')->insert([
            'id' => '45', 
            'name' => 'Dune Buggy Trailer', 
            'number' => 60082, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 17.10.01.png'
        ]);
        DB::table('sets')->insert([
            'id' => '46', 
            'name' => 'Surfer Rescue', 
            'number' => 60011, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 17.34.31.png'
        ]);
        DB::table('sets')->insert([
            'id' => '47', 
            'name' => 'Cargo Heliplane', 
            'number' => 60021, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 17.36.17.png'
        ]);
        DB::table('sets')->insert([
            'id' => '48', 
            'name' => 'Camper Van', 
            'number' => 60057, 
            'filename' => 'Bildschirmfoto 2015-10-10 um 17.43.14.png'
        ]);
    }
}
