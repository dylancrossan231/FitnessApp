@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T13:31:31+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T13:35:42+00:00



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Recipes
                <a href="{{ route('recipes.create') }}" class="btn btn-primary float-right">Add</a>
              </div>
                <div class="card-body">
                  @if (count($recipes) === 0)
                  <p>There are no recipes to display.</p>
                  @else
                  <table id="table-recipes" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Portions</th>
                      <th>Ingredients</th>
                    </thead>
                    <tbody>
                      @foreach ($recipes as $recipe)
                      <tr data id="{{ $recipe->id }}">
                        <td>{{ $recipe->name }}</td>
                        <td>{{ $recipe->amount }}</td>
                        <td>{{ $recipe->portions }}</td>
                        <td></td>
                        <td>
                          <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-default">View</a>
                          <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
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
