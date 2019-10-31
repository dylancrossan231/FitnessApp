<h1> HelloWorld <h1>
  @extends('layouts.app')

  @section('content')
      <h2 class="text-center">All foods</h2>
      <ul class="list-group py-3 mb-3">
        @forelse($foods as $food)

          <li class="list-group-item my-2">
            <h2> protein <h2>
            <h5 class="">{{ $food->protein }}</h5>
            <h2> carbohydrates <h2>
            <h5 class="">{{ $food->carbohydrates}}</h5>
            <h2> fats <h2>
            <h5class="">{{ $food->fats }}</h5>
            <h2>calories<h2>
            <h5 class="">{{ $food->calories}}</h5>

            <div class="clearfix"></div>

          </li>
        @empty
           <h4 class="text-center">No foods Found!</h4>
        @endforelse
      </ul>
      <div class="d-flex justify-content-center">

      </div>
  @endsection
