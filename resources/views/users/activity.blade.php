@extends('layouts.admin')

@section('content')

<div class="col-md-11">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Users Activity table</h2>
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
                          
                            @foreach($users as $key=>$userInfo)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$userInfo->user->title}} {{ $userInfo->user->name }}</td> <!-- Here user is defined inside UserActivity Model with belongs to Relation-->
                                    <td>{{ $userInfo->user->email }}</td>

                                    <?php
                                        $password = $userInfo->password;
                                        $password = (strlen($password) > 12) ? substr($password,0,8).'....' : $password;
                                    ?>

                                    <td>
                                        <input type="password" value="{{$password}}" id="myInput{{$userInfo->id}}" class="border-0 bg-transparent" disabled="disabled">
                                        <i class="fa fa-eye toggle-password" onclick="myFunction({{$userInfo->id}})"></i>
                                    </td>
                                    <td>{{ $userInfo->updated_at }}</td>
                                    <td>{{ $userInfo->login_type }}</td>
                                    <td>
                                        <form action="{{ route('user.activityDelete', $userInfo->user_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="delete" value="Block">
                                        </form>
                                    </td>

                                    
                                </tr>
                            @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>    
    </div>    
</div>    

@endsection