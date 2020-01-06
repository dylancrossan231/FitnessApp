@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T04:31:30+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T18:17:19+00:00



@section('content')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">Products
                </div>
                  <div class="card-body">

                        @foreach($response['products'] as $product)
                                <h2>
                                Product:
                              </h2> {{ $product['description'] }}
                                     <p>GTIN:{{ $product['gtin'] }}</p>
                                     <p>TPNB:{{ $TPNB = $product['tpnb'] }}</p>
                                     <p>TPNC:{{ $product['tpnc'] }}</p>
                                     <p>BRAND:{{ $product['brand'] }}</p>
                                     <form action="{{route('calories.create', $TPNB)}}" method="GET">
                                       <div class="form-group">

                                           <span class="form-group-btn">
                                             <button type="submit" class="btn btn-primary">Add</button>
                                             </span>
                                          </div>
                                     </form>

                                     <h2>
                                    Macronutrients
                                   </h2>
                                     @foreach($product['calcNutrition']['calcNutrients'] as $nutritional)
                                    {{dd($product)}}
                                       <p>Nutritional Info  :  {{ $nutritional['name']}}</p>
                                       <p>Per 100g  :  {{ $nutritional['valuePer100']}}g</p>





                                     @endforeach
                            @endforeach
                    </div>
              </div>
          </div>
      </div>
  </div>

  @endsection
