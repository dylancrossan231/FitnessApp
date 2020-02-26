@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Meals
              </div>
                <div class="card-body">
                @if (count($meals) === 0))
                  <p>There are no meals to display.</p>
                @else
                  @foreach($mealTypes as $mealType)
                  <h1>{{$mealType->name}}</h1>
                  <a href="{{ route('meals.create', $mealType->id) }}" class="btn btn-primary float-right">Add</a>

                    @foreach($meals as $meal)

                    @if($meal->meal_type_id === $mealType->id) 

                    <table id="table-meals" class="table table-hover">
                    <thead>
                      <th>Date</th>
                      <th>Time</th>
                    </thead>
                    <tbody>
                    <tr data-id=>
                        <td>{{ $meal->date }}</td>
                        <td>{{ $meal->time }}</td>
                      </table>
                      </tbody>
                    </table>
                    
                     @endif
                    @endforeach  

                  @endforeach

                @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection                  