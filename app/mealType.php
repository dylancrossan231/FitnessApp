<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mealType extends Model
{
    public function meals() {
        return $this->hasMany('App\Meal');
    }
}
