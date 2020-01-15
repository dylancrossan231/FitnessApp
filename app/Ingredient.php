<?php


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
