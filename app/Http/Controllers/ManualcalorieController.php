<?php
# @Date:   2019-10-29T15:14:07+00:00
# @Last modified time: 2019-11-08T17:52:32+00:00




namespace App\Http\Controllers;
use App\Food;
use Illuminate\Http\Request;

class ManualcalorieController extends Controller
{



  public function index()
  {
      $foods = Food::orderBy('created_at', 'desc')->paginate(8);

      return view('calories.manualcalorieadd', [  'foods' => $foods,   ]);
}


// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)


























}
