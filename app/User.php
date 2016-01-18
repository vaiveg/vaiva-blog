<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'name', 'surname', 'email', 'password', 'photo'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the posts of the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the comments of the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the posts ratings of the user.
     */
    public function posts_ratings()
    {
        return $this->hasMany('App\Posts_rating');
    }

    /**
     * Get the comments ratings of the user.
     */
    public function comments_ratings()
    {
        return $this->hasMany('App\Comments_rating');
    }
}
