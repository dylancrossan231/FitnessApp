<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\User;
use App\mealType;

class Meal extends Model
{
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe', 'meal_recipes')->withPivot('portion');
    }
    public function ingredient()
    {
        return $this->belongsToMany('App\Ingredient', 'meal_ingredients')->withPivot('ingredient_amount');
    }
    public function mealType() {
        return $this->belongsTo('App\mealType');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
