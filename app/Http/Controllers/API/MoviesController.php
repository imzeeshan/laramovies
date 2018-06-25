<?php

namespace App\Http\Controllers\API;
use \Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller as Controller;

use App\User;
use App\Genre;
use App\Roles;
use App\Movies;
use App\Ratings;
use App\CastCrew;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::paginate(10);
        return $movies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles    = Roles::all();
        $casts    = User::whereIn('role_id', array('2','3'))->get();
        $crews    = User::whereIn('role_id', array('7'))->get();
        $genres   = Genre::all();  
        $ratings  = Ratings::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie      = new Movies();
        
        $name          = $request->name;
        $release_year  = $request->release_year;
        $image         = $request->image;
        $genre_id      = $request->genre_id;
        $rating_id     = $request->rating_id;
        $plot          = $request->plot;
        $country       = $request->country;
        $imdb_id       = $request->imdb_id;

        $movie->name          = $name;
        $movie->release_year  = $release_year;
        $movie->image         = $image;
        $movie->genre_id      = $genre_id;
        $movie->rating_id     = $rating_id;
        $movie->plot          = $plot;
        $movie->country       = $country;
        $movie->imdb_id       = $imdb_id;

        $movie->save();

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie  = Movies::find($id);
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie    = Movies::find($id);
        $casts    = User::whereIn('role_id', array('2','3'))->get();
        $crews    = User::whereIn('role_id', array('7'))->get();
        $genres   = Genre::all();  
        $ratings  = Ratings::all();        
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie         = Movies::find($id);
        $cast_crews    = CastCrew::firstOrNew(['movie_id' => $movie->id]);
        $name          = $request->name;
        $release_year  = $request->release_year;
        $image         = $request->image;
        $genre_id      = $request->genre_id;
        $rating_id     = $request->rating_id;
        $plot          = $request->plot;
        $country       = $request->country;
        $imdb_id       = $request->imdb_id;

        $movie->name          = $name;
        $movie->release_year  = $release_year;
        
        if($image)
            $movie->image         = $image;
        
            $movie->genre_id      = $genre_id;
        $movie->rating_id     = $rating_id;

        if($country)
            $movie->country       = $country;
        
        if($plot)
            $movie->plot          = $plot;
        
        if($imdb_id)
            $movie->imdb_id       = $imdb_id;

        $movie->save();

        $crews  =  explode(",",$request->crew_value);
        $casts  =  explode(",",$request->cast_value);

        if(count($crews)>0 && count($casts)>0 )
        {
            $cast_crews::where('movie_id',$movie->id)->delete(); 
        }

        if(isset($crews) && count($crews)>1)
        {
            foreach($crews as $crew)
            {
                $cast_crews->user_id = $crew;
                $cast_crews->movie_id = $movie->id;
                $cast_crews->insert([
                                        'user_id' => $crew,
                                        'movie_id' => $movie->id,
                                        'created_at' => Carbon::now(),
                                        'updated_at' => Carbon::now()
                                    ]);
            }
        }

        if(count($casts)>0 && count($casts)>1)
        {
            foreach($casts as $cast)
            {
                $cast_crews->user_id  = $cast;
                $cast_crews->movie_id = $movie->id;
                $cast_crews->insert([
                                        'user_id' => $cast,
                                        'movie_id' => $movie->id,
                                        'created_at' => Carbon::now(),
                                        'updated_at' => Carbon::now()
                                    ]);
            }
        }

        return 'success';

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movies::find($id)->delete();
       return 'success';
    }
}
