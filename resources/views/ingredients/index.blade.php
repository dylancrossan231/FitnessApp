@section('content')
# @Author: izzy
# @Date:   2020-01-06T06:01:59+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T07:39:51+00:00



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @if (count($meals) === 0)
                  <p>There are no meals to display.</p>
                  @else
                  <table id="table-meals" class="table table-hover">
                    <thead>
                      <th>Meal</th>
                      <th>Date</th>
                      <th>Time</th>
                    </thead>
                    <tbody>
                      @foreach ($meals as $meal)
                      <tr data id="{{ $meal->id }}">
                        <td>{{ $meal->meal_type_id }}</td>
                        <td>{{ $meal->date }}</td>
                        <td>{{ $meal->time }}</td>
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
