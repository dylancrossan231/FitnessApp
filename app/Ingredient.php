<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;

class Ingredient extends Model
{
    protected $fillable = ['user_id'];

    public function recipe()
    {
        return $this->belongsToMany('App\Recipe', 'recipe_ingredients','recipe_id','ingredient_id')->withPivot('ingredient_amount');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function meal()
    {
        return $this->belongsToMany('App\Meal', 'meal_ingredients');
    }
}
