<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Ingredient;
Use App\Cookie;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 5; $i++) {
        $ingredient = new Ingredient;
        $cookie = Cookie::inRandomOrder()->first();
        $ingredient->cookie_id = $cookie->id;
        $tmp = 'ingredient_' . $i;
        $ingredient->name = $tmp;
        $ingredient->save();
      }
    }
}
