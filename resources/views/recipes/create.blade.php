@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-mid-offset-2">
            <div class="card">
                <div class="card-header">Add new recipe</div>
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



                                          
                    <form action="{{ route('apiview.search') }}" method="POST">

                    <div class="form-group ">
                        <input type="search" name="search" class="form-control">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="form-group-btn">
                          <button type="submit" class="btn btn-primary">Search For Ingredient</button>
                          </span>
                      </div>
                    </form>



                      <script>
                        $(document).ready(function () {
                           $('.checkbox input:checkbox').on('click', function(){
                           $(this).closest('.checkbox').find('.ingredient_amounts').toggle();
                             })
                          });
                      </script>

                      <form method="POST" action="{{ route('recipes.store') }}">
                      <label for="ingredient">Ingredient</label>
                      @foreach($ingredients as $ingredient)
                      <div class=" checkbox form-inline">
                        <label>
                          <input type="checkbox"  name="ingredient[{{$ingredient->id}}][checked]" value="true"> <label>{{$ingredient->name}}
                        </label>
                        <input class="form-control ingredient_amounts" type="text" name="ingredient[{{$ingredient->id}}][amount]"  placeholder="Amount" style="display:none" >


                      </div>  
                      @endforeach



                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}"/>
                      </div>

                      <div class="form-group">
                        <label for="portions">Portions</label>
                        <input type="text" class="form-control" id="portions" name="portions" value="{{ old('portions') }}"/>
                      </div>

                    
                                
                      
                      
                      <a href="{{ route('recipes.index') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="form-group">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
