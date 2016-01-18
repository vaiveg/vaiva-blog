<?php

namespace App\Repositories;

use App\User;
use App\Post;

class UserRepository
{
    /**
     * Get all of the users.
     *
     * @return Collection
     */
    public function allUsers()
    {
        return User::all();
    }

    /**
     * Get information about the users.
     *
     * @param  string  $userId
     * @return Collection
     */
    public function userInfo($userId)
    {
        return User::find($userId);
    }

    /**
     * Get all the posts of a given user.
     *
     * @param  string  $userId
     * @return Collection
     */
    public function userPosts($userId)
    {
        return Post::where('user_id', $userId)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

}
