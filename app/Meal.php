<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:09:47+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\User;
use App\mealType;

class Meal extends Model
{
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe', 'meal_recipes');
    }

    public function mealType() {
        return $this->belongsTo('App\mealType');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
