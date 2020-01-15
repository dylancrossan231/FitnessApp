@extends('layouts.app')
06T20:30:37+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-09T11:11:30+00:00


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">
                  {{ $weight->date }}
                </div>
                <div class="card-body">
                  <table id="table-weight" class="table table-hover">
                    <tbody>
                    <tr>
                      <td>User ID</td>
                      <td>{{ $weight->user_id }}</td>
                    </tr>
                    <tr>
                      <td>Weight</td>
                      <td>{{ $weight->value }} kg</td>
                    </tr>
                      <tr>
                        <td>Date</td>
                        <td>{{ $weight->date }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('weights.index') }}" class="btn btn-default">Back</a>
                  <a href="{{ route('weights.edit', $weight->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{ route('weights.destroy', $weight->id) }}">
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
