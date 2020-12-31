<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Dog Tinder</title>

        <link rel="icon" href="/images/favicon.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>

        @if (session('message'))
          <script>
            $(document).ready(function(){
              $('.toast').toast('show');
            });
          </script>
        @endif
        
        <style>
            .img-circle {
                border-radius: 50%;
                width: 50px;
                height: 50px;
                margin-right: 25px;
            }
        </style>
    
    </head>


    <body class="bg-secondary">
      <nav class="navbar navbar-dark bg-dark justify-content-between">
        <a href="/home" class="navbar-brand">Navbar</a>
        <form class="form-inline">
          @if (Auth::check())
            <span class="text-white" style="margin-right:10px;"><img class="img-circle" style="margin-right: 0px;" src="{{ Auth::user()->avatar }}" alt="User Profile Image">&nbsp;<a class="btn btn-outline-light disabled">{{ Auth::user()->username }}</a></span>
            <a href="{{ route('auth.logout') }}" class="btn btn-outline-info" type="submit">Logout</a>
          @else
            <a href="{{ route('users.create') }}" class="btn btn-outline-info" type="button" style="margin-right:10px; ">Create an account</a>
            <a href="{{ route('auth.login') }}" class="btn btn-outline-success" type="button">Login</a>
          @endif
        </form>
      </nav>

      <div class="container-fluid" style="padding-top: 10px;">

          @yield('content')

      </div>
    </body>
</html>