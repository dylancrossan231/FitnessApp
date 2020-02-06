<?php




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
      $ingredients = Ingredient::all();
        return view('recipes.create')->with([
          'ingredients' => $ingredients
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





      //$ingredient_ids = Ingredient::findOrFail($id);
      

      $request->validate([
        'name' => 'required|max:25',
        'amount' => 'required',
        'portions' => 'required'
      ]);
// dd($request);
      $recipe = new Recipe();
      $recipe->name = $request->input('name');
      $recipe->amount = $request->input('amount');
      $recipe->portions = $request->input('portions');
      $recipe->save($request->all());

      // foreach($request->ingredient_ids as $ingredient_id){
      // foreach($request->ingredient_amounts as $ingredient_amount){
      //   if(($ingredient_id&&!$ingredient_amount == null)){
      // $recipe->ingredient()->attach($ingredient_id,[
      //   'ingredient_amount' => $ingredient_amount
      //   ])

      // }
     
      foreach($request->ingredient as  $ingredient_id=>$ingredient){
        dd($request);
        if($ingredient['checked']="true" && $ingredient['amount']!==null){
         $recipe->ingredient()->attach($ingredient_id,[
        'ingredient_amount' => $ingredient['amount']]);
      }
      }      
    

      return redirect()->route('recipes.index');
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
      $ingredient = Ingredient::where(recipe_id , $id)->get();
      return view('recipes.show')->with([
        'recipe' => $recipe,
        'ingredient' => $ingredient
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
      $recipe = Recipe::findOrFail($id);

      $request->validate([
        'name' => 'required|max:25',
        'amount' => 'required',
        'portions' => 'required'
      ]);

      $recipe->name = $request->input('name');
      $recipe->amount = $request->input('amount');
      $recipe->portions = $request->input('portions');

      $recipe->save();

      return redirect()->route('recipes.index');
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
