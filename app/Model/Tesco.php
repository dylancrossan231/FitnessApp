<?php
# @Date:   2019-11-08T17:55:02+00:00
# @Last modified time: 2019-11-08T17:57:47+00:00




namespace App\Model;
use App\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Tesco extends Model
{
    public function insert($Request $request){
      print_r($request->input());



    }
}
