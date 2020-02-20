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
                    <div id="chart"></div>
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
                                            format: '%Y-%m-%d'
                                         }
                                }
                            }
                        });

                    </script>

                </body>
            </div>
        </div>
    </div>
</div>
@endsection
