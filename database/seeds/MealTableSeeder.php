<?php
use App\Meal;
use Illuminate\Database\Seeder;

class MealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meal= new Meal();
        
        $meal->save();
    }
}
