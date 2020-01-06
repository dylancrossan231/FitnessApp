<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T04:57:41+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Weight;
use App\Meal;

class User extends Model
{
    public function weight() {
        return $this->hasMany('App\Weight');
    }

    public function meal() {
        return $this->hasMany('App\Meal');
    }
}
