@extends('layouts.app')
@section('content')


@foreach($response['products'] as $product)
        <h2>
        Product:
      </h2> {{ $product['description'] }}
             <p>TPNB:{{ $product['tpnb'] }}</p>
             <h2>
            Macronutrients
           </h2>
             @foreach($product['calcNutrition']['calcNutrients'] as $nutritional)

               <p>Nutritional Info  :  {{ $nutritional['name']}}</p>
               <p>Per 100g  :  {{ $nutritional['valuePer100'][1]}}g</p>

             @endforeach
    @endforeach
  @endsection