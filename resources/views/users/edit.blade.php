@extends('layouts.app')

@section('content')
<div class="container">
    <form class="card" role="form" method="POST" action="{{ route('users.update',$user->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Editing User : {{ $user->first_name , $user->last_name }}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">First Name</label>
                                      <input id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{$user->first_name}}" type="text">
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input  id="last_name" name="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}" type="text">
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                              <label class="form-label">Email address</label>
                                              <input id="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}" type="email">
                                            </div>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                              <label class="form-label">Password</label>
                                              <input id="password" name="password" class="form-control"  placeholder="Password" value=""  type="password">
                                            </div>
                                          </div>


                                    <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <select id="role" name="role" class="form-control custom-select" >
                                              @foreach($roles as $role)
                                              <option value="{{$role->id}}">{{$role->name}}</option>
                                              @endforeach
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group mb-0">
                                              <label class="form-label">Bio</label>
                                              <textarea id="bio" name="bio" rows="5" class="form-control" placeholder="User Bio goes here">{{$user->bio}}</textarea>
                                            </div>
                                    </div>
                </div>
        </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <a href="{{ route('users.index') }}" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ml-auto">Update</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>
@endsection
