<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Meal;
use App\Ingredient;

class Recipe extends Model
{
    public function meal()
    {
        return $this->belongsToMany('App\Meal', 'meal_recipes');
    }

    public function ingredient()
    {
        return $this->belongsToMany('App\Ingredient', 'recipe_ingredients','recipe_id','ingredient_id')->withPivot('ingredient_amount');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
