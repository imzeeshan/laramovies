@extends('layouts.app')

@section('content')
<div class="container">
    <form class="card" role="form" method="POST" action="{{ route('roles.store') }}">
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                      <h3 class="card-title">Create a new Role</h3>
                    </div>
                    <div class="card-body">
                          <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input id="name" name="name" class="form-control" placeholder="Role Name" value="" type="text">
                                      </div>
                                    </div>
                          </div>
                    </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>
@endsection
