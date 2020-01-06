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
                        <td>Amount</td>
                        <td>{{ $recipe->amount }}</td>
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
@endsection
