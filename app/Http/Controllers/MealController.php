<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T08:14:40+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\User;
use App\mealType;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $meals = Meal::all();

      return view('meals.index')->with([
        'meals' => $meals
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'user_id' => 'required|alpha_num|max:3',
        'meal_type_id' => 'required|alpha_num|max:3'
      ]);

      $meal = new Meal();
      $meal->date = $request->input('date');
      $meal->time = $request->input('time');
      $meal->user_id = $request->input('user_id');
      $meal->meal_type_id = $request->input('user_id');
      $meal->save();

      return redirect()->route('meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $meal = Meal::findOrFail($id);
      return view('meals.show')->with([
        'meal' => $meal
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $meal = Meal::findOrFail($id);
      return view('meals.edit')->with([
        'meal' => $meal
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'user_id' => 'required|alpha_num|max:3',
        'meal_type_id' => 'required|alpha_num|max:3'
      ]);

      $meal->date = $request->input('date');
      $meal->time = $request->input('time');
      $meal->user_id = $request->input('user_id');
      $meal->meal_type_id = $request->input('user_id');
      $meal->save();

      return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $meal = Meal::findOrFail($id);
      $meal->delete();
      return redirect()->route('meals.index');
    }
}
