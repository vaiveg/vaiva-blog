<?php

namespace App\Repositories;

use App\User;
use App\Post;
use App\Category;

class PostRepository
{
    /**
     * Get all of the posts.
     *
     * @return Collection
     */
    public function allPosts()
    {
        return Post::all();
    }

    /**
     * Get the post information.
     *
     * @param  string  $postId
     * @return Collection
     */
    public function postInfo($postId)
    {
        return Post::find($postId);
    }

    /**
     * Get all of the categories.
     *
     * @return Collection
     */
    public function allCategories()
    {
        return Category::all();
    }
}
