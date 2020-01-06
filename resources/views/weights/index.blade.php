@section('content')
# @Author: izzy
# @Date:   2020-01-06T06:01:59+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T08:10:26+00:00



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @if (count($weights) === 0)
                  <p>There are no weight measurements to display.</p>
                  @else
                  <table id="table-weights" class="table table-hover">
                    <thead>
                      <th>Weight</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                      @foreach ($weights as $weight)
                      <tr data id="{{ $weight->id }}">
                        <td>{{ $weight->value }}</td>
                        <td>{{ $weight->date }}</td>
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
