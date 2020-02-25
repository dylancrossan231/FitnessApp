@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Weight measurements
                <a href="{{ route('weights.create') }}" class="btn btn-primary float-right">Add</a>
              </div>
                <div class="card-body">
                  @if (count($weights) === 0)
                  <p>There are no weight measurements to display.</p>
                  @else
                  <table id="table-weights" class="table table-hover">
                    <thead>
                      <th>Weight</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                      @foreach ($weights as $weight)
                      <tr data id="{{ $weight->id }}">
                        <td>{{ $weight->value }} kg</td>
                        <td>{{ $weight->date }}</td>
                        <td>
                          <a href="{{ route('weights.show', $weight->id) }}" class="btn btn-default">View</a>
                          <a href="{{ route('weights.edit', $weight->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('weights.destroy', $weight->id) }}">
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
