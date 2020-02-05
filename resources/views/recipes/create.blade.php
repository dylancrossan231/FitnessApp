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
                    <!-- <label for="ingredient">Ingredient</label>
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
                                        
                                    </select> -->




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
                                    <input type="checkbox" name="ingredient_ids[{{$ingredient->id}}]" value="{{$ingredient->id}}"> <label>{{$ingredient->name}}
                                  </label>
                                  <input class="form-control ingredient_amounts" type="text" name="ingredient_amounts[]" value="" placeholder="Amount" style="display:none" >


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
