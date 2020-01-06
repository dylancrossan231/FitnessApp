<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T04:57:58+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Weight extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
}
