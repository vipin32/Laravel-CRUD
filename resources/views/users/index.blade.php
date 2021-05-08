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
                            <th scope="col">Title</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Message</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ $user->title }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->birthdate }}</td>
                                <td>{{ $user->notes }}</td>

                                <td>                     
                                    @foreach($user->address as $address)
                                        <p>{{ $address->address }}, {{ $address->city }}, {{ $address->state }}, {{ $address->postal_code }}</p>
                                    @endforeach
                                </td>

                                <td>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="delete" value="Delete">
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