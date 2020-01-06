<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T10:43:02+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Recipe;


class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ingredients = Ingredient::all();

      return view('ingredients.index')->with([
        'ingredients' => $ingredients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
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
        'unit' => 'required|max:3',
        'energy_kj' => 'required',
        'energy_kcal' => 'required',
        'protein' => 'required',
        'carbs' => 'required',
        'sugar' => 'required',
        'fat' => 'required',
        'saturated_fat' => 'required',
        'fiber' => 'required',
        'is_product' => 'required'
      ]);

      $ingredient = new Ingredient();

      $ingredient->name = $request->input('name');
      $ingredient->unit = $request->input('unit');
      $ingredient->energy_kj = $request->input('energy_kj');
      $ingredient->energy_kcal = $request->input('energy_kcal');
      $ingredient->protein = $request->input('protein');
      $ingredient->carbs = $request->input('carbs');
      $ingredient->sugar = $request->input('sugar');
      $ingredient->fat = $request->input('fat');
      $ingredient->saturated_fat = $request->input('saturated_fat');
      $ingredient->fiber = $request->input('fiber');
      $ingredient->is_product = $request->input('is_product');

      $ingredient->save();

      return redirect()->route('ingredients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ingredient = Ingredient::findOrFail($id);
      return view('ingredients.show')->with([
        'ingredient' => $ingredient
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ingredient = Ingredient::findOrFail($id);
      return view('ingredients.edit')->with([
        'ingredient' => $ingredient
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:25',
        'unit' => 'required|max:3',
        'energy_kj' => 'required',
        'energy_kcal' => 'required',
        'protein' => 'required',
        'carbs' => 'required',
        'sugar' => 'required',
        'fat' => 'required',
        'saturated_fat' => 'required',
        'fiber' => 'required',
        'is_product' => 'required'
      ]);

      $ingredient->name = $request->input('name');
      $ingredient->unit = $request->input('unit');
      $ingredient->energy_kj = $request->input('energy_kj');
      $ingredient->energy_kcal = $request->input('energy_kcal');
      $ingredient->protein = $request->input('protein');
      $ingredient->carbs = $request->input('carbs');
      $ingredient->sugar = $request->input('sugar');
      $ingredient->fat = $request->input('fat');
      $ingredient->saturated_fat = $request->input('saturated_fat');
      $ingredient->fiber = $request->input('fiber');
      $ingredient->is_product = $request->input('is_product');

      $ingredient->save();

      return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ingredient = Ingredient::findOrFail($id);
      $ingredient->delete();
      return redirect()->route('ingredients.index');
    }
}
