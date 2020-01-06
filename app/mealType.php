<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:09:41+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Meal;

class mealType extends Model
{
    public function meal()
    {
        return $this->hasMany('App\Meal');
    }
}
