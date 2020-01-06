<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:01:13+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;

class Ingredient extends Model
{
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe', 'recipe_ingredients');
    }
}
