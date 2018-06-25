@extends('layouts.app')

@section('content')
<div class="container">
    <form class="card" role="form" method="POST" action="{{ route('movies.update',$movie->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden"  id="crew_value" name="crew_value" value="">
        <input type="hidden"  id="cast_value"  name="cast_value"  value="">
        
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Editing Movie : {{ $movie->name }}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Name</label>
                                      <input id="name" name="name" class="form-control" placeholder="Movie Name" value="{{$movie->name}}" type="text">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Year</label>
                                        <input  id="release_year" name="release_year" class="form-control" placeholder="Release Name" value="{{$movie->release_year}}" type="text">
                                      </div>
                                  </div>


                                  <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label">Genre</label>
                                        <select id="genre_id" name="genre_id" class="form-control custom-select">
                                            @foreach($genres as $genre)
                                              @if($movie->genre_id==$genre->id)
                                              <option value="{{$genre->id}}" selected="selected">{{$genre->name}}</option>    
                                              @else
                                              <option value="{{$genre->id}}">{{$genre->name}}</option>
                                              @endif                                              
                                            @endforeach

                                        </select>
                                      </div>
                                 </div>
                              
                                <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label">Rating</label>
                                        <select id="rating_id" name="rating_id" class="form-control custom-select">
                                          @foreach($ratings as $rating)
                                            @if($movie->rating_id==$rating->id)
                                            <option value="{{$rating->id}}" selected="selected">{{$rating->name}}</option>    
                                            @else
                                            <option value="{{$rating->id}}">{{$rating->name}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                      </div>
                                </div>

                                <div class="col-sm-8 col-md-8">
                                      <div class="form-group">
                                          <label class="form-label">Casts</label>
                                          <select id="casts" name="casts" class="form-control custom-select">
                                              @foreach($casts as $cast)
                                                <option value="{{$cast->id}}">{{$cast->first_name}} , {{$cast->last_name}}</option>                                        
                                              @endforeach
                                          </select>
                                      </div>
                                </div>

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">&nbsp;</label>
                                      <input  id="cast_btn" name="cast_btn" class="form-control btn btn-success add-more" placeholder="Release Name" value="Add" type="button">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-8">
                                    <div class="form-group">
                                      <table class="table table-bordered table-hover" id="casts_table" name="casts_table">
                                          
                                      </table>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Crew</label>
                                        <select id="crew" name="crew" class="form-control custom-select">
                                            @foreach($crews as $crew)
                                              <option value="{{$crew->id}}">{{$crew->first_name}} , {{$crew->last_name}}</option>                                        
                                            @endforeach
                                        </select>
                                    </div>
                              </div>

                              <div class="col-sm-2 col-md-2">
                                  <div class="form-group">
                                    <label class="form-label">&nbsp;</label>
                                    <input  id="crew_btn" name="crew_btn" class="form-control btn btn-success add-more" placeholder="Release Name" value="Add" type="button">
                                  </div>
                              </div>

                              <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                    <table class="table table-bordered table-hover" id="crew_table" name="crew_table">
                                        
                                    </table>
                                  </div>
                              </div>

                                



                                    
                </div>
        </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <a href="{{ route('movies.index') }}" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ml-auto">Update</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>

@endsection

@section('custom_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
  var cast_id_items = [];
  var crew_id_items = [];

  $(document).ready(function(){
    var i=1,j=1;
     $("#cast_btn").click(function(){
      var cast    = $("#casts option:selected").text();   
      var cast_id = $("#casts").val();   

      cast_id_items.push(cast_id);

      var data_to_append = "<td>"+cast+"</td><td><button class='btn btn-danger btn-xs remove' type='button'><i class='glyphicon glyphicon-remove'></i> Remove</button></td>";
      $('#casts_table').append('<tr id="'+(i+1)+'">'+data_to_append+'</tr>');
      i++; 

      $('#cast_value').val((cast_id_items));

    });

     $("#crew_btn").click(function(){
      var crew = $("#crew option:selected").text();   
      var crew_id = $("#crew").val();  
             
      crew_id_items.push(crew_id);

      var data_to_append = "<td>"+crew+"</td><td><button class='btn btn-danger btn-xs remove' type='button'><i class='glyphicon glyphicon-remove'></i> Remove</button></td>";
      $('#crew_table').append('<tr id="'+(j+1)+'">'+data_to_append+'</tr>');
      j++; 

      $('#crew_value').val((crew_id_items));

    });


   $("body").on("click",".remove",function(){ 
        $(this).closest('tr').remove();
      });


  });

</script>
@endsection

