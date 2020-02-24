@extends('layouts.app')
06T20:30:37+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-09T11:10:56+00:00


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Add new weight measurement</div>
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
                    <form method="POST" action="{{ route('weights.store') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}"/>
                      </div>
                      <div class="form-group">
                        <label for="value">Weight</label>
                        <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}"/>
                        kg
                      </div>
                      <!-- <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"/>
                      </div> -->
                      <a href="{{ route('weights.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
