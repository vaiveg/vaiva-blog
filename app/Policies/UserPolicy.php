<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * Determine if the given user can delete other users.
     *
     * @param  User  $user
     * @return bool
     */
    public function destroy(User $user)
    {
        return $user->type === 'admin';
    }
}
