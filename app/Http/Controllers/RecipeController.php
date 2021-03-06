<?php




namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Meal;
use Auth;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;



class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::findOrFail(Auth::id());
      $recipes = $user->recipe()->get();
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
      $user_id = Auth::id();
      $ingredients = Ingredient::all();
        return view('recipes.create')->with([
          'ingredients' => $ingredients,
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
      //$ingredient_ids = Ingredient::findOrFail($id);


      $request->validate([
        'name' => 'required|max:25'
      ]);
// dd($request);
      $recipe = new Recipe();
      $recipe->name = $request->input('name');
      $recipe->user_id = $request->input('user_id');
      $recipe->save($request->all());

      // foreach($request->ingredient_ids as $ingredient_id){
      // foreach($request->ingredient_amounts as $ingredient_amount){
      //   if(($ingredient_id&&!$ingredient_amount == null)){
      // $recipe->ingredient()->attach($ingredient_id,[
      //   'ingredient_amount' => $ingredient_amount
      //   ])

      // }

      foreach($request->ingredient as  $ingredient_id=>$ingredient){
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
      $ingredients = $recipe->ingredient()->get();
      return view('recipes.show')->with([
        'recipe' => $recipe,
        'ingredients' => $ingredients

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
      $ingredients = Ingredient::all();

      $recipe = Recipe::findOrFail($id);
      return view('recipes.edit')->with([
        'recipe' => $recipe,
        'ingredients' => $ingredients
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $recipe = Recipe::findOrFail($id);
      
      $request->validate([
        'name' => 'required|max:25',
        'portions' => 'required'
      ]);

      $recipe->name = $request->input('name');
      $recipe->portions = $request->input('portions');

      $recipe->save($request->all());

      
      foreach($request->ingredient as  $ingredient_id=>$ingredient){
        $ingredient_exists = $recipe->ingredient()->where('ingredient_id', $ingredient_id)->get();

        if($ingredient['checked']="true" && $ingredient['amount']!==null && $ingredient_exists == null){
         $recipe->ingredient()->attach($ingredient_id,[
           
        'ingredient_amount' => $ingredient['amount']]);
        }  else {
          $recipe->ingredient()->updateExistingPivot($ingredient_id, ['ingredient_amount' => $ingredient['amount']]);
          // $model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
          // $recipe->ingredient()->attach($ingredient_id,[
            // ingredient_exists
          // $ingredient_exists['amount'] = $ingredient_exists['amount']]} + 
        }
      }





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
   
    public function destroyingredient($id, $ingredient_id){
        $recipe = Recipe::findOrFail($id);
        $ingredient = Ingredient::findOrFail($ingredient_id);

        $recipe->ingredient()->detach($recipe->ingredient_id);
        return redirect()->route('recipes.show', $recipe->id);
    }

    
}
