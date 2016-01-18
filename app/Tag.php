<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the posts for the tag.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
