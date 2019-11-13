@extends('layouts.app')
@section('content')

<?php
use GuzzleHttp\Client;
use App\Api;

  //This line creates a new Client from guzzle -> This client is basically a http request
  $client = new Client();

  //This part querys a url that I have hardcoded, you will want to make this a variable in yours

  //The headers part is a header that is attached to your http request - The tesco api expects a subscription key
  $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnc=268231759', [
      'headers' => [
          'Ocp-Apim-Subscription-Key' => env('API_KEY')
          // 'a3c51c289be148ac9492336f4b6dadff'
      ]
  ]);

  //This function runs your request
  $response=$response->getBody();
  //This line turns the returned json into an array -> you need to do this so laravel can understand the json object
  $response = json_decode($response, true);
   // dd($response);

  ?>


    {{-- //This is a laravel loop which runs through the "products" in the JSON --}}
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






  @endsection
