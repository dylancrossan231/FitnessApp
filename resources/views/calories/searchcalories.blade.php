@extends('layouts.app')
@section('content')
<h1> Search Results for {{ $query }}  </h1>




    @foreach($response ['uk']['ghs']['products']['results'] as $product)


    <h1>{{$product['name']}}</h1>
    <h3>Unit Amount: {{$product['UnitQuantity']}}</h3>
    <h3>TPNB: {{ $TPNB =$product['tpnb']}}</h3>
    <h3>Unit Amount: {{$product['image']}}</h3>


                                  <h2>
                                    Macronutrients
                                   </h2>
                                     @foreach($productinfo['calcNutrition']['calcNutrients'] as $nutritional)
                                       <p>{{ $names = $nutritional['name']}} Per 100g  :  {{ $per100 = $nutritional['valuePer100']}}g</p>
                                       
                                     @endforeach

                                  


                                     <form action="{{route('calories.create', $TPNB)}}" method="GET">
                                       <div class="form-group">

                                           <span class="form-group-btn">
                                             <button type="submit" class="btn btn-primary">Add</button>
                                             </span>
                                          </div>
                                     </form>

  



    </br>
    </br>
    </br>


    @endforeach

  @endsection
