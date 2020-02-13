<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Weight;
use App\Meal;

class User extends Authenticatable
{
    public function weight() {
        return $this->hasMany('App\Weight');
    }

    public function meal() {
        return $this->hasMany('App\Meal');
    }

}
