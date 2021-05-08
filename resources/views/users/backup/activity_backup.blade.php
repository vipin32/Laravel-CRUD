@extends('layouts.admin')

@section('content')

<div class="col-md-11">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Users table</h2>
            </div>
            <div class="card-body bg-light">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Last Login Time</th>
                            <th scope="col">Type Of Login</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$user->title}} {{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <?php
                                    $password = $user->password;
                                    $password = (strlen($password) > 12) ? substr($password,0,8).'....' : $password;
                                ?>

                                <td>
                                    <input type="password" value="{{$password}}" id="myInput{{$user->id}}" class="border-0 bg-transparent" disabled="disabled">
                                    <i class="fa fa-eye toggle-password" onclick="myFunction({{$user->id}})"></i>
                                </td>
                                <td>{{ $user->birthdate }}</td>
                                <td>{{ $user->notes }}</td>
                                <td><a href="">Block</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>    
    </div>    
</div>    

@endsection