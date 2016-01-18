<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts_tag extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'post_id', 'tag_id'];

    /**
     * Get the post that ows the tag.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Get the tag that belongs to the post.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

}
