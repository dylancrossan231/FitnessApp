<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function weight() {
        return $this->hasMany('App\Weight');
    }

    public function meal() {
        return $this->hasMany('App\Meal');
    }
}