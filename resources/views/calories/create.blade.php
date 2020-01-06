@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T13:31:31+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T17:26:12+00:00



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
                    
                  
              
                    <form method="POST" action="{{ route('apisearch.store') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product['description']) }}"/>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" value="{{ old('name', $product['qtyContents']['quantityUom']) }}"/>
                      </div>
                      @foreach($product['calcNutrition']['calcNutrients'] as $nutritional)
                      <div class="form-group">
                        <label for={{$nutritional['name']}}>
                        {{
                          $name = str_replace(' ', '', $nutritional['name'])
                        }}

                        </label>
                        <input type="text" class="form-control" id={{$name}} name={{$name}} value="{{ old('name', $nutritional['valuePer100']) }}"/>
                      </div>
                      @endforeach


                     
                      <a href="{{ route('ingredients.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
