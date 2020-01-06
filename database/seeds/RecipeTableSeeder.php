<?php
use App\Recipe;
use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe = new Recipe();
        $recipe->name = 'curry';
        $recipe->recipe_amount = '500g';
        $recipe->save();
    }
}
