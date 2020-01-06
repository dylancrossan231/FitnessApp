@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @if (count($recipes) === 0)
                  <p>There are no recipes to display.</p>
                  @else
                  <table id="table-recipes" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Portions</th>
                    </thead>
                    <tbody>
                      @foreach ($recipes as $recipe)
                      <tr data id="{{ $recipe->id }}">
                        <td>{{ $recipe->name }}</td>
                        <td>{{ $recipe->amount }}</td>
                        <td>{{ $recipe->portions }}</td>
                        <td></td>
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
