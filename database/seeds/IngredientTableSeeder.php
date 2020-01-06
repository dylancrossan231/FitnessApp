<?php
use App\Ingredient;
use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient = new Ingredient();
        $ingredient->name = 'Orange';
        $ingredient->grams = 'grams';
        $ingredient->energykj = '1000 kj';
        $ingredient->energykcals = '210kcals';
        $ingredient->protein = '24';
        $ingredient->carbohydrates = '100';
        $ingredient->sugars = '100';
        $ingredient->fats = '100';
        $ingredient->saturatedfat = '100';
        $ingredient->fiber = '100';
        $ingredient->save();
    }
}
