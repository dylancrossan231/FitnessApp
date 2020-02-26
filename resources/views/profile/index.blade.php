@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                <link href="c3/c3.css" rel="stylesheet">
                <script src="d3/d3.min.js" charset="utf-8"></script>
                <script src="c3/c3.min.js"></script>
                </head>
                <body>
                    <div>
                      <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary float-right">Edit profile</a>
                      <h3>User info</h3>
                      <p>Username: {{ $user->username }}</p>
                      <p>Name: {{ $user->name }}</p>
                      <p>Date of birth: {{ $user->dob }}</p>
                      <p>Gender: {{ $user->gender }}</p>
                      <p>Country: {{ $user->country }}</p>
                      <br/>

                      <h3>Fitness profile</h3>
                      <p>Height: {{ $user->height }} m</p>
                      <p>Start weight: {{ $user->start_weight }} kg</p>
                      <p>Start BMI:

                        <script type="text/javascript">

                              var start_weight = "<?php echo $user->start_weight; ?>";
                              var height = "<?php echo $user->height; ?>";
                              var start_bmi = start_weight/Math.pow(height, 2);

                            document.write(start_bmi.toFixed(2));

                          </script>

                      </p>

                      <p>Your start BMI classified you as

                        <script type="text/javascript">

                              var bmi;
                              if (start_bmi < 18.5) {
                                bmi = "underweight";
                              }

                              else if (start_bmi >= 18.5 && start_bmi < 25) {
                                bmi = "healthy";
                              }

                              else if (start_bmi >= 25 && start_bmi < 30) {
                                bmi = "overweight";
                              }

                              else {
                                bmi = "obese";
                              }

                            document.write(bmi);

                          </script>.
                        </p>

                      <p>Goal weight: {{ $user->goal_weight }} kg</p>

                      <p>Goal BMI:

                        <script type="text/javascript">

                              var goal_weight = "<?php echo $user->goal_weight; ?>";
                              var goal_bmi = goal_weight/Math.pow(height, 2);

                            document.write(goal_bmi.toFixed(2));

                          </script>

                      </p>

                      <p>Your goal BMI will classify you as

                        <script type="text/javascript">

                              var bmi2;
                              if (goal_bmi < 18.5) {
                                bmi2 = "underweight";
                              }

                              else if (goal_bmi >= 18.5 && goal_bmi < 25) {
                                bmi2 = "healthy";
                              }

                              else if (goal_bmi >= 25 && goal_bmi < 30) {
                                bmi2 = "overweight";
                              }

                              else {
                                bmi2 = "obese";
                              }

                            document.write(bmi2);

                          </script>.
                        </p>

                        <br/>

                        <h3>Profile info</h3>
                        <p>{{ $user->profile_info }}</p>

                </div>

                <br/>
                <a href="{{ route('weights.create') }}" class="btn btn-primary float-right">Add weight</a>
                <h3>Weight trends</h3>
                <br/>

                <div id="chart">


                    <script>


                        //Get Weigths from PHP/Laravel and decode to json
                        var weights=@json($weights);
                        //Create an array with the title
                        var weightCol=['weight']
                        //push after column title weight each weight value into the array
                        weights.forEach(weight => {
                            weightCol.push(weight.value)
                        });

                        var xCol=['times']
                        weights.forEach(weight => {
                            xCol.push(weight.created_at)
                        });


                            var chart = c3.generate({
                            data: {
                                stack:
                                {
                                    normalize: true
                                },
                                x: 'times',
                                xFormat: '%Y-%m-%d %H:%M:%S',
                                columns: [
                                    xCol,
                                    weightCol

                                ]
                            },
                            axis: {
                                x: {
                                    type: 'timeseries',
                                    tick: {
                                            rotate: 50,
                                            multiline: false,
                                            format: '%Y-%m-%d'
                                         },
                                         height: 60

                                }

                            }
                        });

                    </script>
                    </div>

                    <br/><br/>

            <div>
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
                    <td>{{ $weight->value }} kg</td>
                    <td>{{ $weight->date }}</td>
                    <td>
                      <a href="{{ route('weights.edit', $weight->id) }}" class="btn btn-warning">Edit</a>
                      <form style="display:inline-block" method="POST" action="{{ route('weights.destroy', $weight->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</>
                      </form>
                    </td>
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
</div>


                </body>
            </div>
        </div>
    </div>
</div>
@endsection
