@extends('layouts.app')
# @Author: izzy
# @Date:   2019-11-19T11:52:45+00:00
# @Last modified by:   izzy
# @Last modified time: 2019-11-19T12:58:07+00:00



@section('content')



<form action="{{ route('apiview.search') }}" method="POST">

<<<<<<< HEAD
  <div class="form-group">
      <input type="search" name="search" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <span class="form-group-btn">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
     </div>
</form>
=======
  //The headers part is a header that is attached to your http request - The tesco api expects a subscription key
  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnc=268231759', [
      'headers' => [
          'Ocp-Apim-Subscription-Key' => 'a3c51c289be148ac9492336f4b6dadff'
          //env('API_KEY')


      ]
  ]);
>>>>>>> 3327135562c867de8dd0b56b397975cd2b800abc


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


                {{-- {{ $nutritional['perServingHeader'] }} --}}

             @endforeach
    @endforeach

<<<<<<< HEAD
=======


<?php

  //This line creates a new Client from guzzle -> This client is basically a http request
  $client1 = new Client();

  //This part querys a url that I have hardcoded, you will want to make this a variable in yours

  //The headers part is a header that is attached to your http request - The tesco api expects a subscription key
  $response =$client->request('GET', 'https://dev.tescolabs.com/grocery/products/?query="milk"&offset=0&limit=10', [
      'headers' => [
          'Ocp-Apim-Subscription-Key' => 'a3c51c289be148ac9492336f4b6dadff'
          //env('API_KEY')


      ]
  ]);

  //This function runs your request
  $response=$response->getBody();
  //This line turns the returned json into an array -> you need to do this so laravel can understand the json object
  $response = json_decode($response, true);
   // dd($response);

  ?>


     @foreach($response['uk']['ghs']['products']['results'] as $manyproducts)
     <p> products: {{$manyproducts['tpnb']}}</p>



     @endforeach






>>>>>>> 3327135562c867de8dd0b56b397975cd2b800abc
  @endsection
