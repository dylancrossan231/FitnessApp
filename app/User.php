<?php



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
