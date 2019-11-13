
  @extends('layouts.app')

  @section('content')
      <h2 class="text-center">All foods</h2>
      <ul class="list-group py-3 mb-3">
        @forelse($foods as $food)

          <li class="list-group-item my-2">

            <h2>Name: <h2>
            <h5 class="">{{ $food->name }}</h5>

            <h2>Protein: <h2>
            <h5 class="">{{ $food->protein }}</h5>

            <h2>Carbohydrates: <h2>
            <h5 class="">{{ $food->carbohydrates}}</h5>

            <h2>Fats: <h2>
            <h5class="">{{ $food->fats }}</h5>

            <h2>Kcals: <h2>
            <h5 class="">{{ $food->calories}}</h5>

            <h2>Weight: <h2>
            <h5 class="">{{ $food->weight}}</h5>

            
            <div class="clearfix"></div>

          </li>
        @empty
           <h4 class="text-center">No foods Found!</h4>
        @endforelse
      </ul>
      <div class="d-flex justify-content-center">

      </div>
  @endsection
