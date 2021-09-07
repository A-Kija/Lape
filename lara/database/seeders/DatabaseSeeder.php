<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('it_IT');

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $mastersCount = 20;
        foreach(range(1, $mastersCount) as $_) {
            DB::table('masters')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
            ]);
        }
        $outfits = ['Dress', 'Pants', 'Coat', 'Shorts', 'Cardigan', 'Pullover', 'Overall', 'Bikini', 'Hat', 'Jeans', 'Skirt', 'Long skirt', 'Mini skirt', 'Shirts'];

        foreach(range(1, 200) as $_) {
            DB::table('outfits')->insert([
                'type' => $outfits[rand(0, count($outfits) - 1)],
                'color' => $faker->safeColorName,
                'size' => rand(5, 22),
                'about' => $faker->realText(500),
                'master_id' => rand(1, $mastersCount)
            ]);
        }
    }
}


