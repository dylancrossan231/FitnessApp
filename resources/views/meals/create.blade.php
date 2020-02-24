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

                      <select name="recipe_id">
                                        @foreach ($recipes as $recipe)
                                            <option 
                                                value={{ $recipe->id }} 
                                                {{ (old('recipe_id') == $recipe->id) 
                                                    ? "selected" 
                                                    : "" }}
                                                 > {{ $recipe->name}}</option>
                                        @endforeach
                                    </select>
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
</div>
@endsection
