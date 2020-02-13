
@extends('layouts.app')

@section('content')
<form action="{{ route('apiview.search') }}" method="POST">

  <div class="form-group">
      <input type="search" name="search" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="form-group-btn">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
     </div>
</form>

@endsection
