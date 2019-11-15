@extends('layouts.app')
@section('content')

<h1> Search Results for <?php $query ?> </h1>

    @foreach($response ['uk']['ghs']['products']['results'] as $product)


    <h1>{{$product['name']}}</h1>
    <h3>Unit Amount: {{$product['UnitQuantity']}}</h3>
    <h3>TPNB: {{$product['tpnb']}}</h3>
    <h3>Unit Amount: {{$product['image']}}</h3>


    </br>
    </br>
    </br>

                    




    @endforeach

  @endsection
