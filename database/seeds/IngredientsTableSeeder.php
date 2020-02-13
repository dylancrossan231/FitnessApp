<?php
# @Author: izzy
# @Date:   2020-01-06T04:36:17+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:42:31+00:00




use Illuminate\Database\Seeder;
use App\Ingredient;
use App\Recipe;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ingredient = new Ingredient();
      $ingredient->name = 'Apple';
      $ingredient->unit = 'kg';
      $ingredient->energy_kj = '500';
      $ingredient->energy_kcal = '125';
      $ingredient->protein = '20';
      $ingredient->carbs = '60';
      $ingredient->sugar = '12';
      $ingredient->fat = '8.9';
      $ingredient->saturated_fat = '8.9';
      $ingredient->fiber = '2.1';
      $ingredient->is_product = '0';
      $ingredient->save();

    }
}
