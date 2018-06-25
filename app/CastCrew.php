<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastCrew extends Model
{
    protected $table = 'cast_crews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id','user_id',
    ];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

}
