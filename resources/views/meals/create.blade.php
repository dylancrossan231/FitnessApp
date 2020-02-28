@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T13:31:31+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-09T11:14:03+00:00



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Add new meal</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div>

                    @endif
                    <form method="POST" action="{{ route('meals.store') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}"/>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="meal_type_id" name="meal_type_id" value="{{ $meal_type_id->id }}"/>
                      </div>
                      <div class="card">
                <div class="card-header">Add new Ingredients</div>

                    <div class="card-body">
                      <script>
                        $(document).ready(function () {
                           $('.checkbox input:checkbox').on('click', function(){
                           $(this).closest('.checkbox').find('.ingredient_amounts').toggle();
                             })
                          });
                      </script>

                      <form method="POST" action="{{ route('recipes.store') }}">
                      @foreach($ingredients as $ingredient)
                      <div class=" checkbox form-inline">
                            <label>
                              <input type="checkbox"  name="ingredient[{{$ingredient->id}}][checked]" value="true"> <label>{{$ingredient->name}}
                            </label>
                      <input class="form-control ingredient_amounts" type="text" name="ingredient[{{$ingredient->id}}][amount]"  placeholder="Amount" style="display:none" >
                      </div>
                      @endforeach
                      </div>
                      </div>
@if(count($recipes)===0)

@else
                      <div class="card">
                    <div class="card-header">Add new recipes</div>
                    <div class="card-body">
                      <script>
                        $(document).ready(function () {
                           $('.checkbox input:checkbox').on('click', function(){
                           $(this).closest('.checkbox').find('.portion').toggle();
                             })
                          });
                      </script>

                      <form method="POST" action="{{ route('recipes.store') }}">
                      @foreach($recipes as $recipe)
                      <div class=" checkbox form-inline">
                            <label>
                              <input type="checkbox"  name="recipe[{{$recipe->id}}][checked]" value="true"> <label>{{$recipe->name}}
                            </label>
                      <input class="form-control portion" type="text" name="recipe[{{$recipe->id}}][portion]"  placeholder="How many portions?" style="display:none" >
                      </div>
                      @endforeach
                      </div>
                      </div>

                      @endif


                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}"/>
                      </div>
                      <a href="{{ route('meals.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>





    <script>

@endsection
