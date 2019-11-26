<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Meal;
class Recipe extends Model
{
    public function meals()
    {
        return $this->belongsToMany('App\Meal', 'meal_recipe');
    }
    public function ingredient()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredient_recipe');
    }
}
