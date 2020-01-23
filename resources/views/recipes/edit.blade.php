@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Edit recipe</div>
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

                    <label for="ingredient">Ingredients</label>
                                    <br/>

                                        @foreach ($ingredients as $ingredient)
                                            {{ $ingredient->name }}

                                                 @endforeach

                                                 <br/>

                    <label for="ingredient">Add ingredient</label>
                                    <br/>
                    <select name="ingredient_id">
                                        @foreach ($ingredients as $ingredient)
                                            <option
                                                value= {{ $ingredient->id  }}
                                                {{ (old('ingredient_id') == $ingredient->id)
                                                    ? "selected"
                                                    : ""   }}
                                                 >{{$ingredient->name }}</option>

                                                 @endforeach

                                    </select>

                    <form method="POST" action="{{ route('recipes.update', $recipe->id) }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $recipe->name) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $recipe->amount) }}"/>
                      </div>
                      <div class="form-group">
                        <label for="portions">Portions</label>
                        <input type="text" class="form-control" id="portions" name="portions" value="{{ old('portions', $recipe->portions) }}"/>
                      </div>
                      <a href="{{ route('recipes.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
