<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public function genre()
    {
       return $this->belongsTo('App\Genre');
    }

    public function rating()
    {
       return $this->belongsTo('App\Ratings');
    }

    public function cast_crews()
    {
       return $this->hasMany('App\CastCrew','movie_id');;
    }


}
