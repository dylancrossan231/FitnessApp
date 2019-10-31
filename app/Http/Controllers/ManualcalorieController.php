<?php

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
























}
