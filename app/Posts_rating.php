<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_rating extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'post_id', 'user_id'];

    /**
     * Get the post that ows the rating.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Get the user that ows the rating.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
