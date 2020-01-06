<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:07:47+00:00




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
        return $this->belongsToMany('App\Ingredient', 'recipe_ingredients');
    }
}
