<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * Determine if the given user can delete the given category.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function destroy(User $user, Category $category)
    {
        return $user->type === 'admin';
    }
}
