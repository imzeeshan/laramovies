@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header">
                    <h3 class="card-title">Showing User : {{ $user->first_name , $user->last_name }}</h3>
                    </div>
                    <div class="card-body">
                                <div class="row">
                                        <div class="table">
                                                <table class="table table-striped">
                                                        <tr>
                                                                <td>User Id : {{ $user->id}}</td>
                                                        </tr>
                                                        <tr>
                                                                <td>First Name : {{ $user->first_name}}</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Last Name : {{ $user->last_name}} </td>
                                                        </tr>
                                                        <tr>
                                                                <td>Role  : {{ $user->role->name}} </td>
                                                        </tr>
                                                        <tr>
                                                                <td>Email  : {{ $user->email}} </td>
                                                        </tr>                          
                                                        <tr>
                                                                <td>Bio  : {{ $user->bio}}</td>
                                                        </tr>                                                        
                                                </table>
                                            </div>
                                </div>
                    </div>

                    <a href="{{ route('users.index') }}" class="btn btn-link">Back</a>

            </div>
        </div>
</div>
@endsection
