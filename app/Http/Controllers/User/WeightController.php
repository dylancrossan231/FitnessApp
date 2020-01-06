<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T07:11:17+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use App\User;


class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $weights = Weight::all();

      return view('weights.index')->with([
        'weights' => $weights
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.weights.create');
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
        'value' => 'required|max:5',
        'user_id' => 'required|alpha_num|max:3'
      ]);

      $weight = new Weight();
      $weight->date = $request->input('date');
      $weight->value = $request->input('value');
      $weight->user_id = $request->input('user_id');
      $weight->save();

      return redirect()->route('user.weights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
      $weight = Weight::findOrFail($id);
      return view('user.weights.show')->with([
        'weight' => $weight
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
      $weight = Weight::findOrFail($id);
      return view('user.weights.edit')->with([
        'weight' => $weight
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $weight)
    {
      $request->validate([
        'date' => 'required|date',
        'value' => 'required|max:5',
        'user_id' => 'required|alpha_num|max:3'
      ]);

      $weight->date = $request->input('date');
      $weight->value = $request->input('value');
      $weight->user_id = $request->input('user_id');
      $weight->save();

      return redirect()->route('user.weights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
      $weight = Weight::findOrFail($id);
      $weight->delete();
      return redirect()->route('user.weights.index');
    }
}
