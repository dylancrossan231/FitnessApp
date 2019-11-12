

      {{-- <h2 class="text-center">All foods</h2>
      <ul class="list-group py-3 mb-3">
        @forelse($foods as $food)

          <li class="list-group-item my-2">

            <h2>Name<h2>
            <h5 class="">{{ $food->name}}</h5>

            <h2> protein <h2>
            <h5 class="">{{ $food->protein }}</h5>

            <h2>Carbohydrates <h2>
            <h5 class="">{{ $food->carbohydrates}}</h5>

            <h2>Fats <h2>
            <h5class="">{{ $food->fats }}</h5>

            <h2>Calories<h2>
            <h5 class="">{{ $food->calories}}</h5>

            <h2>Weight<h2>
            <h5 class="">{{ $food->weight}}</h5>

            <h2>Weight<h2>
            <h5 class="">{{ $food->weight}}</h5>


            <div class="clearfix"></div>


 --}}
 @extends('layouts.app')
 @section('content')

 <?php
         //Install Guzzle through composer - this line will import it
         use GuzzleHttp\Client;

         //This line creates a new Client from guzzle -> This client is basically a http request
         $client = new Client();

         //This part querys a url that I have hardcoded, you will want to make this a variable in yours
         //The headers part is a header that is attached to your http request - The tesco api expects a subscription key
         $response =$client->request('GET', 'https://dev.tescolabs.com/product/?tpnb=51148744', [
             'headers' => [
                 'Ocp-Apim-Subscription-Key' => 'a3c51c289be148ac9492336f4b6dadff'
             ]
         ]);

         //This function runs your request
         $response=$response->getBody();
         //This line turns the returned json into an array -> you need to do this so laravel can understand the json object
         $response = json_decode($response, true);

 ?>

     {{-- This is a laravel loop which runs through the "products" in the JSON--}}
     @foreach($response['products'] as $product)
         <h2>
         Product:
       </h2> {{ $product['description'] }}
              <p>GTIN:{{ $product['gtin'] }}</p>
              <p>TPNB:{{ $product['tpnb'] }}</p>
              <p>TPNC:{{ $product['tpnc'] }}</p>
              <p>BRAND:{{ $product['brand'] }}</p>
              

     @endforeach

   @endsection
