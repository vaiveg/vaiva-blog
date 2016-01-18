<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'category_id', 'photo'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'user_id'];

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the post's tags for the post.
     */
    public function posts_tags()
    {
        return $this->hasMany('App\Posts_tag');
    }

    /**
     * Get the post's ratings for the post.
     */
    public function posts_ratings()
    {
        return $this->hasMany('App\Posts_rating');
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that the post belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
