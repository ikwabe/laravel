
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <script type="text/javascript">
        window.onload = function(){

            document.getElementById('exampleInputPassword1').value = new Date().toISOString().slice(0,10);
        }
        </script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ShedOc</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
  </div>
</nav>
    <div class="content">
                <div class="title m-b-md">
                    Report
                </div>
            </div>
        <div class="container ">
        <div class="col-md-4 ">
                <form action ="/report" method="post">
                <input type="hidden" name="_token" value= "<?php echo csrf_token();?>">
                <div class="form-group">
                        <label for="exampleInputPassword1">Report Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="rdate">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Report Type</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="reptype">
                            <option selected>Choose...</option>
                            <option value="1">Single report CA</option>
                            <option value="2">Single report Summary</option>
                            <option value="3">Accumulative reports (Salary averages)</option>
                            <option value="4">Accumulative reports (Employee allowances)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">View Report</button>
                    
                   
                </form>
        
                   
          </div>
          <br>
                @if($message != null)
                    <div class="form-group"><span class="alert alert-danger form-control">{{$message}}</span></div>
                    @endif
         
<br>

          <div>
          @if(count($allowance) > 0)
                    <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Employee Name</th>
                                    @foreach($allowance as $allw)
                                    <th scope="col">{{$allw->allowancename}}</th>
                                    @endforeach
                                    <th scope="col">Basic Salary</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Avarage</th>
                                    <th scope="col">Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($report as $emp)
                                    <tr>
                                    <?php $total = 0; $avarage = 0; $rank='A'; ?>
                                    <th scope="row">{{$i++}}</th>
                                    <td scope="col">{{$emp[0]}}</td>
                                    @for($key = 2; $key < count($emp); $key++)
                                    <td scope="col">{{$emp[$key]}}</td>
                                    
                                    <input type="hidden" name="" value= "{{$total+=$emp[$key]}}">

                                    @endfor
                                    <td scope="col">{{$emp[1]}}</td>
                                    <td scope="col">{{$total+$emp[1]}}</td>
                                    <td scope="col">{{$avarage}}</td>
                                    <td scope="col">{{$rank}}</td>
                                    </tr>
                                @endforeach
                                   
                                </tbody>
                                </table>
                                @endif
                                </div>
          </div>
    </body>
</html>
