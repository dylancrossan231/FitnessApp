@section('content')
# @Author: izzy
# @Date:   2020-01-06T06:01:59+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T11:00:43+00:00



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @if (count($ingredients) === 0)
                  <p>There are no ingredients to display.</p>
                  @else
                  <table id="table-ingredients" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Unit</th>
                      <th>Energy (kJ)</th>
                      <th>Energy (kcal)</th>
                      <th>Protein</th>
                      <th>Carbohydrates</th>
                      <th>Sugar</th>
                      <th>Fat</th>
                      <th>Saturated fat</th>
                      <th>Fiber</th>
                    </thead>
                    <tbody>
                      @foreach ($ingredients as $ingredient)
                      <tr data id="{{ $ingredient->id }}">
                        <td>{{ $ingredient->name }}</td>
                        <td>{{ $ingredient->unit }}</td>
                        <td>{{ $ingredient->energy_kj }}</td>
                        <td>{{ $ingredient->energy_kcal }}</td>
                        <td>{{ $ingredient->protein }}</td>
                        <td>{{ $ingredient->carbs }}</td>
                        <td>{{ $ingredient->sugar }}</td>
                        <td>{{ $ingredient->fat }}</td>
                        <td>{{ $ingredient->saturated_fat }}</td>
                        <td>{{ $ingredient->fiber }}</td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
