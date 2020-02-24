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
                  <table id="table-recipes" class="table table-hover">
                    <thead>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Date of Birth</th>
                      <th>Gender</th>
                      <th>Country</th>
                      <th>Current Weight</th>
                      <th>Goal Weight</th>



                    </thead>
                    <tbody>

                      <tr data id="{{ $user->id }}">
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->start_weight }}</td>
                        <td>{{ $user->goal_weight }}</td>



                        <td></td>
                        <td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>

                
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
