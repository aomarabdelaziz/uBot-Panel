<?php

namespace App\Policies;

use App\User;
use App\UserProject;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAddProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return $result = $user->projects()->count() == 0;


    }

    public function save(User $user)
    {

        return $user->role == 'premium';


    }





}
