@extends('layouts.app')
# @Author: izzy
# @Date:   2019-12-06T20:30:37+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T11:13:03+00:00


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Add new ingredient</div>
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
                    <form method="POST" action="{{ route('ingredients.store') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="energy_kj">Energy (kJ)</label>
                        <input type="text" class="form-control" id="energy_kj" name="energy_kj" value="{{ old('energy_kj') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="energy_kcal">Energy (kcal)</label>
                        <input type="text" class="form-control" id="energy_kcal" name="energy_kcal" value="{{ old('energy_kcal') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="protein">Protein</label>
                        <input type="text" class="form-control" id="protein" name="protein" value="{{ old('protein') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="carbs">Carbohydrates</label>
                        <input type="text" class="form-control" id="carbs" name="carbs" value="{{ old('carbs') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="sugar">Sugar</label>
                        <input type="text" class="form-control" id="sugar" name="sugar" value="{{ old('sugar') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="fat">Fat</label>
                        <input type="text" class="form-control" id="fat" name="fat" value="{{ old('fat') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="saturated_fat">Saturated fat</label>
                        <input type="text" class="form-control" id="saturated_fat" name="saturated_fat" value="{{ old('saturated_fat') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="fiber">Fiber</label>
                        <input type="text" class="form-control" id="fiber" name="fiber" value="{{ old('fiber') }}"/>
                      </div>
                      <a href="{{ route('ingredients.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
