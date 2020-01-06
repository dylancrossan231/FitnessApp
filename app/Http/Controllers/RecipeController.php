<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T10:45:35+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Meal;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = Recipe::all();

      return view('recipes.index')->with([
        'recipes' => $recipes
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
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
        'name' => 'required|max:25',
        'amount' => 'required',
        'portions' => 'required'
      ]);

      $recipe = new Recipe();

      $recipe->name = $request->input('name');
      $recipe->amount = $request->input('amount');
      $recipe->portions = $request->input('portions');

      $recipe->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $recipe = Recipe::findOrFail($id);
      return view('recipes.show')->with([
        'recipe' => $recipe
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $recipe = Recipe::findOrFail($id);
      return view('recipes.edit')->with([
        'recipe' => $recipe
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:25',
        'amount' => 'required',
        'portions' => 'required'
      ]);

      $recipe->name = $request->input('name');
      $recipe->amount = $request->input('amount');
      $recipe->portions = $request->input('portions');

      $recipe->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $recipe = Recipe::findOrFail($id);
      $recipe->delete();
      return redirect()->route('recipes.index');
    }
}
