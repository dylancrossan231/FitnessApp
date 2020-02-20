<?php




namespace App\Http\Controllers;
use App\User;
use Auth;
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
      $user = User::FindOrFail(Auth::id());
      $ingredients = $user->ingredient()->get();
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
      $user_id = Auth::id();
      return view('ingredients.create')->with([
        'user_id' => $user_id
      ]);
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
        'is_product' => 'nullable'

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
      $ingredient->user_id = $request->input('user_id');
      $ingredient->is_product = $request->input('is_product');
// dd($request);

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
      $ingredient = Ingredient::findOrFail($id);

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
        'is_product' => 'nullable'
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
