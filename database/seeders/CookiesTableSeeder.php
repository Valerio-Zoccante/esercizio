<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Cookie;

class CookiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $cookies = [
          'brownies' => '300g',
          'dark_chocolate' => '2300g',
          'white_chocolate' => '450g',
          'sacher_biscuit' => '800g',
          'oreo' => '900g',
          'dobule_biscuit' => '500g'
        ];
        foreach ($cookies as $name => $weight){
            $cookie = new Cookie;
            $cookie->name = $name;
            $cookie->weight = $weight;
            $cookie->calories = $faker->randomDigitNotNull();
            $cookie->save();
        }
    }
}
