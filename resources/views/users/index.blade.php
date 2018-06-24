@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div id="message" name="message" class="alert alert-icon alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ session('message') }}
    </div>
    @endif

    <div class="row justify-content-center">
        <h1 class="page-title"> Users </h1>
        <div class="col-md-12">
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User Id </th>
                            <th>First Name </th>
                            <th>Last Name </th>
                            <th>Role </th>
                            <th>Email </th>                            
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn" href="{{ route('users.show',$user->id)}}">View</a> | 
                                <a class="btn" href="{{ route('users.edit',$user->id)}}">Edit</a> | 
                                <a class="btn"><form method="POST" action="users/{{ $user->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                {{ $users->links() }}
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                        <a class="btn btn-primary ml-auto" href="{{ route('users.create')}}">Add a new User</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
