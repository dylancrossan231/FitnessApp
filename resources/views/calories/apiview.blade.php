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


    @foreach($response['products'] as $product)
        <h2>
        Product:
      </h2> {{ $product['description'] }}
             <p>GTIN:{{ $product['gtin'] }}</p>
             <p>TPNB:{{ $product['tpnb'] }}</p>
             <p>TPNC:{{ $product['tpnc'] }}</p>
             <p>BRAND:{{ $product['brand'] }}</p>
             <h2>
            Macronutrients
           </h2>
             @foreach($product['calcNutrition']['calcNutrients'] as $nutritional)

               <p>Nutritional Info  :{{ $nutritional['name']}}g</p>
               <p>Per 100g  :{{ $nutritional['valuePer100']}}g</p>


                

             @endforeach
    @endforeach



  @endsection

