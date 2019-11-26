<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
class Meal extends Model
{
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'meal_recipe');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product', 'meal_product');
    }
    
}
