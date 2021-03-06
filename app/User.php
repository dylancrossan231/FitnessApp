<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Weight;
use App\Meal;

class User extends Authenticatable
{
    protected $fillable = ['username'];
    public function recipe(){
        return $this->hasMany('App\Recipe');
    }

    public function weight() {
        return $this->hasMany('App\Weight');
    }

    public function meal() {
        return $this->hasMany('App\Meal');
    }
    public function ingredient(){
        return $this->hasMany('App\Ingredient');
    }

}
