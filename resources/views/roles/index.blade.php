@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div id="message" name="message" class="alert alert-icon alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ session('message') }}
    </div>
    @endif
    
    <div class="row justify-content-center">
        

        <h1 class="page-title"> Roles </h1>
      
        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Role Name </th>                    
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn" href="{{ route('roles.show',$role->id)}}">View</a> | 
                                <a class="btn" href="{{ route('roles.edit',$role->id)}}">Edit</a> | 
                                <a class="btn"><form method="POST" action="roles/{{ $role->id }}">
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
                            {{ $roles->links() }}
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                    <a class="btn btn-primary ml-auto" href="{{ route('roles.create')}}">Add a new Role</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
