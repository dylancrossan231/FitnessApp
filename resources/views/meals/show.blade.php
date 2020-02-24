@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                Meal
                </div>
                <div class="card-body">
                  <table id="table-meal" class="table table-hover">
                    <tbody>
                      <tr>
                        <td>User ID</td>
                        <td>{{ $meal->user_id }}</td>
                      </tr>
                      <tr>
                        <td>Meal</td>
                        <td>{{ $meal->meal_type_id }}</td>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                recipes
                </div>
                <div class="card-body">
                  <table id="table-meal" class="table table-hover">
                    <tbody>
                      <tr>
                      @foreach($recipes as $recipe)
                        <td>recipe name</td>
                        <td>{{ $recipe->name }}</td>
                      </tr>

                    </tbody>
                  </table>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
