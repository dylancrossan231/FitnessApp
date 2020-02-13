<?php
# @Author: izzy
# @Date:   2020-01-06T04:37:04+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:34:19+00:00




use Illuminate\Database\Seeder;
use App\mealType;

class MealTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal_type = new mealType();
        $meal_type->name = 'Breakfast';
        $meal_type->save();

        $meal_type = new mealType();
        $meal_type->name = 'Lunch';
        $meal_type->save();

        $meal_type = new mealType();
        $meal_type->name = 'Dinner';
        $meal_type->save();

        $meal_type = new mealType();
        $meal_type->name = 'Supper';
        $meal_type->save();

        $meal_type = new mealType();
        $meal_type->name = 'Snack';
        $meal_type->save();
    }
}
