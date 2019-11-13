<?php
# @Date:   2019-11-12T19:03:11+00:00
# @Last modified time: 2019-11-13T15:49:15+00:00




namespace App\Http\Controllers;
use App\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{

  public function index()
  {


      return view('calories.apiview');
}


}
