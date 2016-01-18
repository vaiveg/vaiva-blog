<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'user_id', 'post_id', 'father_id'];

    /**
     * Get the comment's ratings for the comment.
     */
    public function comments_ratings()
    {
        return $this->hasMany('App\Comments_rating');
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
