<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weblibrary Esteban Luis Trujillo Jorge</title>

   <!-- <link href="/TeachMe/public/assets/css/style.css" rel="stylesheet"> -->
   <!-- <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet"> -->

   {!! Html::style( asset('/css/mios.css')) !!}
   {!! Html::style( asset('/css/style.css')) !!}
   {!! Html::style( asset('/css/productos.css')) !!}


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,700' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="container-fluid">
  <div class="row cabecera">
      <div class="col-xs-12 col-lg-8">
            <h1>Welcome to the WebLibrary Laravel 5</h1>
            <span>Please select your products ... you book store</span>
      </div>
      <div class="col-xs-12 col-lg-4 log-register">
              

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <!--@guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest-->
                    </ul>
                <br>
                <br>

                @if(Route::is('index'))
                  {!!link_to_route('indexcar',$title = 'See the car', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif
                @if(Route::is('indexcar'))
                  {!!link_to_route('index',$title = 'Back home page', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif
                @if(Route::is('indexcardelete'))
                  {!!link_to_route('index',$title = 'Back home page', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif
                @if(Route::is('indexdetail'))
                  {!!link_to_route('index',$title = 'Back home page', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif
                @if(Route::is('login'))
                  {!!link_to_route('index',$title = 'Back home page', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif
                @if(Route::is('register'))
                  {!!link_to_route('index',$title = 'Back home page', $id = 0, $attributes = ['class'=>'btn btn-info text-center pull-right'])!!}
                @endif

      </div>

  </div>


@yield('content')

            
</div>

<!-- Scripts -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://localhost/weblibrarylaravel1/public/js/mio.js"></script>

@extends('layout2')

</body>
</html>
