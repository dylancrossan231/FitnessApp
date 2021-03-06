@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                Meal
                </div>
                <div class="card-body">
                  <table id="table-meal" class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Meal</td>
                        <td><script type="text/javascript">

                              var meal = "<?php echo $meal->meal_type_id; ?>";
                              var type;

                              if (meal == 1) {
                                type = "Breakfast";
                              }

                              else if (meal == 2) {
                                type = "Lunch";
                              }

                              else if (meal == 3) {
                                type = "Dinner";
                              }

                              else if (meal == 4) {
                                type = "Supper";
                              }

                              else if (meal == 5) {
                                type = "Snack";
                              }

                            document.write(type);

                          </script></td>
                      </tr>
                      <tr>
                        <td>Date</td>
                        <td>{{ $meal->date }}</td>
                      </tr>
                      <tr>
                        <td>Time</td>
                        <td>{{ $meal->time }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('meals.index') }}" class="btn btn-default">Back</a>
                  <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{ route('meals.destroy', $meal->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@if(count($recipe)=== 0)


@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-mid-offset-2">
            <div class="card">
              @foreach($meal->recipe as $recipe)
                <div class="card-header">

                  Recipes
                  </div>
                <div class="card-body">
                  <table id="table-recipe" class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Recipe name</td>



                        <td>{{ $recipe->name }}</td>
                      </tr>
                      <tr>
                        <td>Portions</td>
                        <td>{{ $recipe->pivot->portion }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-default">View</a>

                  <form style="display:inline-block" method="POST" action="{{ route('mealrecipes.destroy', ['mealid' => $meal->id, 'recipe_id' => $recipe->id]) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</>
                  </form>
                </div>
            </div>
            @endforeach

            @endif
        </div>



        </div>
    </div>

    @if (count($ingredients) === 0)
    @else
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-10 col-mid-offset-2">
                <div class="card">
                  <div class="card-header">Ingredients
                    <a href="{{ route('ingredients.create') }}" class="btn btn-primary float-right">Add</a>
                  </div>
                    <div class="card-body">
                      <table id="table-ingredients" class="table table-hover">
                        <thead>
                          <th>Name</th>
                          <th>Unit</th>
                          <th>Energy (kJ)</th>
                          <th>Energy (kcal)</th>
                          <th>Protein</th>
                          <th>Carbohydrates</th>
                          <th>Sugar</th>
                          <th>Fat</th>
                          <th>Saturated fat</th>
                          <th>Fiber</th>
                        </thead>
                        <tbody>
                          @foreach($meal->ingredient as $ingredient)
                          <tr data id="{{ $ingredient->id }}">
                            <td>{{ $ingredient->name }}</td>
                            <td>{{ $ingredient->unit }}</td>

                            <td><script type="text/javascript">

                                  var kj = "<?php echo $ingredient->energy_kj; ?>";
                                  var amount = "<?php echo $ingredient->pivot->ingredient_amount/100; ?>";

                                  var total = kj*amount;

                                document.write(total.toFixed(2));

                              </script></td>

                            <td><script type="text/javascript">

                                  var kcal = "<?php echo $ingredient->energy_kcal; ?>";

                                  var total = kcal*amount;

                                document.write(total.toFixed(2));
                              </script></td>

                              <td><script type="text/javascript">

                                    var protein = "<?php echo $ingredient->protein; ?>";

                                    var total = protein*amount;

                                  document.write(total.toFixed(2));
                                </script></td>

                                <td><script type="text/javascript">

                                      var carbs = "<?php echo $ingredient->carbs; ?>";

                                      var total = carbs*amount;

                                    document.write(total.toFixed(2));
                                  </script></td>

                            <td><script type="text/javascript">

                                  var sugar = "<?php echo $ingredient->sugar; ?>";

                                  var total = sugar*amount;

                                document.write(total.toFixed(2));
                              </script></td>

                            <td><script type="text/javascript">

                                  var fat = "<?php echo $ingredient->fat; ?>";

                                  var total = fat*amount;

                                document.write(total.toFixed(2));
                              </script></td>

                            <td><script type="text/javascript">

                                  var saturated_fat = "<?php echo $ingredient->saturated_fat; ?>";

                                  var total = saturated_fat*amount;

                                document.write(total.toFixed(2));
                              </script></td>

                            <td><script type="text/javascript">

                                  var fiber = "<?php echo $ingredient->fiber; ?>";

                                  var total = fiber*amount;

                                document.write(total.toFixed(2));
                              </script></td>

                            <td>
                              <form style="display:inline-block" method="POST" action="{{ route('mealingredients.destroy',['mealid' => $meal->id, 'ingredient_id' => $ingredient->id]) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @endif
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection
