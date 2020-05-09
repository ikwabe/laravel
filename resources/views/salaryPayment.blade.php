
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

        <script>
        window.onload = function(){
            document.getElementById("emplist").hidden = true;
        }
        function changeOption() {

            var opt = document.getElementById("inputGroupSelect01").value;

            if (opt != "2") 
            {
                    document.getElementById("emplist").hidden = true;

            }
            else {
                    document.getElementById("emplist").hidden = false;
                }

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
                    Salary Payments
                </div>
              
            </div>
        <div class="container ">
        <div class="col-md-4 ">
                <form action="/salcreate" method="post">
                <input type="hidden" name="_token" value= "<?php echo csrf_token();?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Payment for</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" onchange="changeOption();" name="choice">
                            <option name="0" selected>Choose...</option>
                            <option value="1">All Employees</option>
                            <option value="2">One Employee</option>
                        </select>
                    </div>
                    <div class="input-group mb-3" id="emplist">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Employee Name</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" name="empid">
                            <option name="0" selected>Choose...</option>
                            @foreach($emp as $emps)
                            <option value="{{$emps->id}}">{{$emps->empname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Pay Salary</button>
                </form>
          </div>
          </div>
          
    </body>
</html>
