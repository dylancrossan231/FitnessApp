<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\User;
use App\mealType;
use Auth;
use App\Recipe;
use App\Ingredient;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::findOrFail(Auth::id());
      $meals = $user->meal()->get();
      $mealTypes = mealType::all();

      return view('meals.index')->with([

        'meals' => $meals,
        'mealTypes' => $mealTypes
      ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $meal_type_id =  mealType::findOrFail($id);
      $user_id = Auth::id();
      $user = User::findOrFail(Auth::id());
      $recipes = $user->recipe()->get();
      $ingredients = $user->ingredient()->get();
        return view('meals.create')->with([
          'user_id' => $user_id,
          'meal_type_id' => $meal_type_id,
          'recipes' => $recipes,
          'user' => $user,
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
      $recipe_id = $request->recipe_id;

      $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'user_id' => 'required|alpha_num|max:3'
      ]);

      $meal = new Meal();
      $meal->date = $request->input('date');
      $meal->time = $request->input('time');
      $meal->user_id = $request->input('user_id');
      $meal->meal_type_id = $request->input('meal_type_id');
      $meal->save();


      foreach($request->recipe as  $recipe_id=>$recipe){
        if($recipe['checked']="true" && $recipe['portion']!==null){
         $meal->recipe()->attach($recipe_id,[
        'portion' => $recipe['portion']]);
      }

      }
      foreach($request->ingredient as  $ingredient_id=>$ingredient){
        if($ingredient['checked']="true" && $ingredient['amount']!==null){
         $meal->ingredient()->attach($ingredient_id,[
        'ingredient_amount' => $ingredient['amount']]);
      }
      } 

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

      $recipes = $meal->recipe()->get();
      $ingredients = $meal->ingredient()->get();

      return view('meals.show')->with([
        'meal' => $meal,
        'recipes' => $recipes,
        'ingredients' = $ingredients
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
      $user_id = Auth::id();
      $meal = Meal::findOrFail($id);
      return view('meals.edit')->with([
        'meal' => $meal,
        'user_id' => $user_id
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
      $meal = Meal::findOrFail($id);

      $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'user_id' => 'required|alpha_num|max:3',
        'meal_type_id' => 'required|alpha_num'
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
