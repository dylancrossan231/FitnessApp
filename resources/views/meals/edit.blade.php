@extends('layouts.app')
# @Author: izzy
# @Date:   2019-12-06T20:30:37+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T10:52:42+00:00


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Edit meal</div>
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
                    <form method="POST" action="{{ route('meals.update', $meal->id) }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="meal_type_id">Meal</label>
                        <input type="text" class="form-control" id="meal_type_id" name="meal_type_id" value="{{ old('meal_type_id', $meal->meal_type_id) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $meal->date) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{ old('time', $meal->time) }}"/>
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
