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
                                <a class="nav-link" href=""><i class="fa fa-tachometer"></i> Dashboard</a>
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

                            <li class="nav-item">
                                <a class="nav-link" href=""><i class="fa fa-file"></i> Files</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="collapse" data-target="#demo"><i class="fa fa-user"></i>  Administration <i class="fa fa-angle-down"></i></a>

                                <div id="demo" class="collapse pl-2">
                                    <a href="#" class="nav-link"><i class="fa fa-building-o"></i> Companies</a>
                                    <a href="#" class="nav-link"><i class="fa fa-users"></i> User Groups</a>
                                    <a href="#" class="nav-link"><i class="fa fa-user"></i> User</a>
                                    <a href="#" class="nav-link"><i class="fa fa-user"></i> People</a>
                                    <a href="#" class="nav-link"><i class="fa fa-users"></i> Teams</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="collapse" data-target="#demo2"><i class="fa fa-cog"></i> System <i class="fa fa-angle-down"></i></a>
                                <div id="demo2" class="collapse pl-2">
                                    <a href="#" class="nav-link"><i class="fa fa-video-camera"></i> How To Videos</a>
                                    <a href="#" class="nav-link"><i class="fa fa-history"></i> Activity Log</a>
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
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body bg-light">

                                                <ul class="nav nav-tabs bg-secondary p-1 rounded" role="tablist">
                                                    <li class="nav-item col-6 p-0 text-center">
                                                        <a class="nav-link active text-dark rounded" data-toggle="tab" href="#personal">Personal</a>
                                                    </li>
                                                    <li class="nav-item col-6 p-0 text-center">
                                                        <a class="nav-link text-dark rounded" data-toggle="tab" href="#companies">Companies</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">

                                                    <div id="personal" class="container tab-pane active"><br>
                                                        
                                                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label for="title">Title</label>
                                                                    <select name="title" id="title" class="form-control">
                                                                        <option value="Mr" <?php if($user->title=='Mr') echo 'selected'; ?>>Mr</option>
                                                                        <option value="Ms" <?php if($user->title=='Ms') echo 'selected'; ?>>Ms</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputState">Name</label>
                                                                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="appellative">Appellative</label>
                                                                    <input type="text" name="appellative" id="appellative" class="form-control"  value="{{$user->appellative}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}">

                                                                    @error('email')
                                                                        <strong class="text-danger">{{ $message }}</strong>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <div class="form-group col-md-4">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Number" maxlength="10" value="{{$user->phone}}">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="bdate">Birthday</label>
                                                                    <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{$user->birthdate}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="uid">Unique Identifier</label>
                                                                    <input type="text" name="uid" id="uid" class="form-control" value="{{$user->uid}}">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="bank_name">Bank</label>
                                                                    <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{$user->bank_name}}">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="bank_account">Bank Account</label>
                                                                    <input type="number" name="bank_account" id="bank_account" class="form-control" value="{{$user->bank_account}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <label for="notes">Notes</label>  
                                                                <textarea name="notes" id="notes" cols="30" rows="3" class="form-control">{{$user->notes}}</textarea>
                                                            </div>
                                                            
                                                            <div class="d-flex justify-content-between mt-3">
                                                            
                                                                <div>
                                                                    <a href="/" name="back" class="btn btn-success mr-1">Back <i class="fa fa-arrow-left"></i></a>
                                                                    
                                                                    <button type="submit" name="delete" class="btn btn-danger mr-1">Delete <i class="fa fa-trash"></i></button>

                                                                    <button type="submit" name="create" class="btn btn-primary">Create <i class="fa fa-plus"></i></button>
                                                                </div>

                                                                <div>
                                                                    <a name="changes" class="btn btn-sm btn-warning mr-1" onClick="window.location.reload();">changes <i class="fa fa-refresh"></i></a>

                                                                    <!-- <button onClick="window.location.reload();">Refresh Page</button> -->


                                                                    <button type="submit" name="update" class="btn btn-success">Update <i class="fa fa-check"></i></button>
                                                                </div>

                                                            </div>                                
                                                            
                                                        </form>
                                                    </div>

                                                    <div id="companies" class="container tab-pane fade"><br>
                                                        <h3>Companies</h3>
                                                    </div>
                                                    
                                                </div>
                                            </div>    
                                        </div>
                                    </div>    

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-outline-dark btn-block my-3 font-weight-bold">
                                                    Addresses <span class="badge badge-dark">{{ count($user->address) }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                   

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Address</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('address.store') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                            <?php
                                                                $id = basename(route('user.update', $user->id));
                                                            
                                                                echo "<input type='hidden' name='user_id' value=$id>";
                                                            ?>

                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" class="form-control" id="address" placeholder="Apartment, studio, or floor">
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="postal_code">Postal Code</label>
                                                                    <input type="text" class="form-control" name="postal_code" id="postal_code">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="state">State</label>
                                                                    <input type="text" name="state" class="form-control" id="state">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="city">City</label>
                                                                    <input type="text" name="city" class="form-control" id="city">
                                                                </div>  
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Add Address</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->


                                    <div class="col-md-12">
                                        <div class="row justify-content-center align-items-center my-3">
                                            <div class="col-md-10">

                                                <div class="d-flex">
                                                    <div class="col-md-3 mb-2">
                                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm pull-right form-rounded">
                                                            New Address <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="fa fa-search form-control-feedback"></span>
                                                            <input type="text" class="form-control form-control-sm form-rounded" placeholder="Filter">
                                                        </div>   
                                                    </div>
                                                    <!-- <input type="search" class="form-control form-control-sm form-rounded" placeholder="Filter"> -->

                                                    
                                                    <div class="col-md-3">
                                                        <a type="button" class="btn btn-outline-dark btn-sm form-rounded" onClick="window.location.reload();">Reload  <i class="fa fa-refresh"></i></a>
                                                    </div>
                                                </div>    

                                                <div class="row justify-content-center my-4">
                                                    <div class="col-md-10 d-flex">
                                                        
                                                        @foreach($user->address as $address)
                                                            <div class="col-md-6 bg-light p-2 font-weight-bold mr-2">
                                                                <p>
                                                                    {{ $address->address }}, {{$address->city}}
                                                                </p> 
                                                                <p>{{ $address->state }}</p>    
                                                                <p>{{ $address->postal_code }}</p>    
                                                            </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>            
