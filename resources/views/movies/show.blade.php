@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header">
                    <h3 class="card-title">Showing Movie : {{ $movie->name }}</h3>
                    </div>
                    <div class="card-body">
                                <div class="row">
                                        <div class="table">
                                                <table class="table table-striped">
                                                        <tr>
                                                                <td><strong>{{ $movie->name}}</strong>: 
                                                                        {{ $movie->plot}}
                                                                </td>
                                                                <td><img src='{{ $movie->image}}'></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Year : {{$movie->release_year}}</td>  
                                                        </tr> 

                                                        <tr>
                                                                <td>Genre : {{$movie->genre->name}}</td>  
                                                        </tr>

                                                        <tr>
                                                                <td>Year : {{$movie->rating->name}}</td>  
                                                        </tr>

                                                        <tr>
                                                                <td>Country : {{$movie->country}}</td>  
                                                        </tr>

                                                        <tr>
                                                                <td><strong>Casts & Crew </strong>: 
                                                                        <ul>
                                                                @foreach($movie->cast_crews as $cast_crew)
                                                                        <li>{{$cast_crew->user->first_name}} {{$cast_crew->user->last_name}}  </li>
                                                                @endforeach   
                                                                        </ul>     
                                                                </td>  
                                                        </tr>

                                                                
                                                </table>
                                            </div>
                                </div>
                    </div>

                    <a href="{{ route('movies.index') }}" class="btn btn-link">Back</a>

            </div>
        </div>
</div>
@endsection
