@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header">
                    <h3 class="card-title">Showing Role : {{ $role->name }}</h3>
                    </div>
                    <div class="card-body">
                                <div class="row">
                                        <div class="table">
                                                <table class="table table-striped">
                                                        <tr>
                                                                <td>Role Id : {{ $role->id}}</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Name : {{ $role->name}}</td>
                                                        </tr>             
                                                </table>
                                            </div>
                                </div>
                    </div>

                    <a href="{{ route('roles.index') }}" class="btn btn-link">Back</a>

            </div>
        </div>
</div>
@endsection
