@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                  {{ $recipe->name }}
                </div>
                <div class="card-body">
                  <table id="table-recipe" class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td>{{ $recipe->name }}</td>
                      </tr>
                      <tr>
                        <td>Portions</td>
                        <td>{{ $recipe->portions }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('recipes.index') }}" class="btn btn-default">Back</a>
                  <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Ingredients
                <a href="{{ route('ingredients.create') }}" class="btn btn-primary float-right">Add</a>
              </div>
                <div class="card-body">
                  @if (count($ingredients) === 0)
                  <p>There are no ingredients to display.</p>
                  @else
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
                      @foreach($recipe->ingredient as $ingredient)
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
                          <a href="{{ route('ingredients.show', $ingredient->id) }}" class="btn btn-default">View</a>
                          <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
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
