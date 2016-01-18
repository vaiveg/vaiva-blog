<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given post.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function destroy(User $user, Post $post)
    {
        return $user->id === $post->user_id;
	return true;
    }
}
