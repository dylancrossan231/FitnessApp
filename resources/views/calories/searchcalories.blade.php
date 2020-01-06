@extends('layouts.app')
# @Author: izzy
# @Date:   2020-01-06T13:31:31+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T18:17:43+00:00



@section('content')
<h1> Search Results for {{ $query }}  </h1>

    @foreach($response ['uk']['ghs']['products']['results'] as $product)


    <h1>{{$product['name']}}</h1>
    <h3>Unit Amount: {{$product['UnitQuantity']}}</h3>
    <h3>TPNB: {{$TPNB =$product['tpnb']}}</h3>
    <h3>Unit Amount: {{$product['image']}}</h3>



<form action="{{route('apisearch.show', $TPNB)}}" method="GET">

  <div class="form-group">

      <span class="form-group-btn">
        <button type="submit" class="btn btn-primary">View</button>
        </span>
     </div>
</form>

    </br>
    </br>
    </br>


    @endforeach

  @endsection
