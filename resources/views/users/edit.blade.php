@extends('layouts.admin')

@section('content')

<div class="col-md-9">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-light">

                <ul class="nav nav-tabs bg-secondary p-1 rounded" role="tablist">
                    <li class="nav-item col-6 p-0 text-center">
                        <a class="nav-link active text-dark rounded" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item col-6 p-0 text-center">
                        <a class="nav-link text-dark rounded" data-toggle="tab" href="#">Companies</a>
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
@endsection