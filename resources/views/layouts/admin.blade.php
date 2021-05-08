<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <main>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2 py-3" style="border-right: 1px solid grey">
    
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.edit', auth()->id()) }}"><i class="fa fa-tachometer"></i> Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href=""><i class="fa fa-calendar"></i> Calendor</a>
                            </li class="nav-item">

                            <li class="nav-item">
                                <a class="nav-link" href=""><i class="fa fa-database"></i>  Data Import</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href=""><i class="fa fa-file"></i> Files</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="collapse" data-target="#demo"><i class="fa fa-user"></i>  Administration <i class="fa fa-angle-down"></i></a>

                                <div id="demo" class="collapse pl-2">
                                    <a href="#" class="nav-link"><i class="fa fa-building-o"></i> Companies</a>
                                    <a href="#" class="nav-link"><i class="fa fa-users"></i> User Groups</a>
                                    <a href="{{ route('user.index') }}" class="nav-link"><i class="fa fa-user"></i> User</a>
                                    <a href="{{ route('user.index') }}" class="nav-link"><i class="fa fa-user"></i> People</a>
                                    <a href="#" class="nav-link"><i class="fa fa-users"></i> Teams</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="collapse" data-target="#demo2"><i class="fa fa-cog"></i> System <i class="fa fa-angle-down"></i></a>
                                <div id="demo2" class="collapse pl-2">
                                    <a href="#" class="nav-link"><i class="fa fa-video-camera"></i> How To Videos</a>
                                    <a href="{{ route('user.activity') }}" class="nav-link"><i class="fa fa-history"></i> Activity Log</a>
                                </div>
                            </li>

                        </ul>
                    </div>


                    <div class="col-md-10 p-0">
                        <nav class="navbar navbar-expand-md navbar-light bg-white">
                            <div class="d-flex justify-content-between" style="width:100%">
                                <a class="navbar-brand">
                                    Edit Person
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">

                                    </ul>

                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif

                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">administrator</a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">edit</a>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    
                        <div class="py-3 bg-white">
                            <div class="row justify-content-center">
                                
                                @yield('content')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Toggle Password Visible -->
    <script> 
        function myFunction($user_id) {
            var x = document.getElementById("myInput"+$user_id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
    </script>
</body>
</html>            
