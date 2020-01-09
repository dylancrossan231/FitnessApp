@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T13:31:31+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-09T11:00:49+00:00



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Meals
                <a href="{{ route('meals.create') }}" class="btn btn-primary float-right">Add</a>
              </div>
                <div class="card-body">
                  @if (count($meals) === 0)
                  <p>There are no meals to display.</p>
                  @else
                  <table id="table-meals" class="table table-hover">
                    <thead>
                      <th>User ID</th>
                      <th>Meal</th>
                      <th>Date</th>
                      <th>Time</th>
                    </thead>
                    <tbody>
                      @foreach ($meals as $meal)
                      <tr data id="{{ $meal->id }}">
                        <td>{{ $meal->user_id }}</td>
                        <td>{{ $meal->meal_type_id }}</td>
                        <td>{{ $meal->date }}</td>
                        <td>{{ $meal->time }}</td>
                        <td>
                          <a href="{{ route('meals.show', $meal->id) }}" class="btn btn-default">View</a>
                          <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('meals.destroy', $meal->id) }}">
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
