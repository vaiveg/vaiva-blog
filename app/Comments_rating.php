<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_rating extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'comment_id', 'user_id'];

    /**
     * Get the comment that ows the rating.
     */
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    /**
     * Get the user that ows the rating.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
