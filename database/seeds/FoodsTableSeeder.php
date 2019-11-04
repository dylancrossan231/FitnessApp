<?php
# @Date:   2019-11-04T22:58:16+00:00
# @Last modified time: 2019-11-04T23:23:34+00:00



use App\Food;
use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $food = new Food();
          $food->name = 'Orange';
          $food->carbohydrates = '3.2';
          $food->fats = '3.2';
          $food->protein = '46';
          $food->calories = '224';
          $food->weight = '50';
          $food->save();
    }
}
