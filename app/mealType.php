<?php



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
