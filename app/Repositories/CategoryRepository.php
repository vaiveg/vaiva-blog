<?php

namespace App\Repositories;

use App\Post;
use App\Category;

class CategoryRepository
{
    /**
     * Get all of the categories.
     *
     * @return Collection
     */
    public function allCategories()
    {
        return Category::all();
    }

    /**
     * Get information about the category.
     *
     * @param  string  $categoryId
     * @return Collection
     */
    public function categoryInfo($categoryId)
    {
        return Category::find($categoryId);
    }

    /**
     * Get all the posts of a given category.
     *
     * @param  string  $categoryId
     * @return Collection
     */
    public function categoryPosts($categoryId)
    {
        return Post::where('category_id', $categoryId)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
