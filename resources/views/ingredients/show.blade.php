@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                  {{ $ingredient->name }}
                </div>
                <div class="card-body">
                  <table id="table-ingredient" class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td>{{ $ingredient->name }}</td>
                      </tr>
                      <tr>
                        <td>Unit</td>
                        <td>{{ $ingredient->unit }}</td>
                      </tr>
                      <tr>
                        <td>Energy (kJ)</td>
                        <td>{{ $ingredient->energy_kj }}</td>
                      </tr>
                      <tr>
                        <td>Energy (kcal)</td>
                        <td>{{ $ingredient->energy_kcal }}</td>
                      </tr>
                      <tr>
                        <td>Protein</td>
                        <td>{{ $ingredient->protein }}</td>
                      </tr>
                      <tr>
                        <td>Carbohydrates</td>
                        <td>{{ $ingredient->carbs }}</td>
                      </tr>
                      <tr>
                        <td>Sugar</td>
                        <td>{{ $ingredient->sugar }}</td>
                      </tr>
                      <tr>
                        <td>Fat</td>
                        <td>{{ $ingredient->fat }}</td>
                      </tr>
                      <tr>
                        <td>Saturated fat</td>
                        <td>{{ $ingredient->saturated_fat }}</td>
                      </tr>
                      <tr>
                        <td>Fiber</td>
                        <td>{{ $ingredient->fiber }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('ingredients.index') }}" class="btn btn-default">Back</a>
                  <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
