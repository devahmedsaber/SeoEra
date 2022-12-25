<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | eCommerce</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Ahmed Saber">
    <!-- MDB icon -->
    <link rel="icon" href="{{url('/')}}/front/img/mdb-favicon.ico" type="image/x-icon"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/front/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{url('/')}}/front/css/style.css">
    <!-- Alertify CSS -->
    <link rel="stylesheet" href="{{url('/')}}/front/css/alertify.min.css"/>

    @yield('css')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">eCommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-expanded="false">
                        Collections
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Groups</a>
                        <a class="dropdown-item" href="#">Categories</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sub Categories</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="clearfix d-none d-sm-inline-block"> Cart
                            <span class="basket-item-count">
                                <span class="badge badge-pill red"> 0 </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.facebook.com/devahmedsaber" target="_blank" class="nav-link waves-effect">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.instagram.com/ahmed.saber.jr" target="_blank" class="nav-link waves-effect">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 py-2 bg-info shadow">

        </div>
    </div>
</div>

@yield('content')

<!-- JQuery JS -->
<script src="{{url('/')}}/front/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{url('/')}}/front/js/bootstrap.min.js"></script>
<!-- Alertify JS -->
<script src="{{url('/')}}/front/js/alertify.min.js"></script>

<script>
    $(document).ready(function () {
        cartLoad();
    });
</script>

@yield('js')

</body>
</html>
