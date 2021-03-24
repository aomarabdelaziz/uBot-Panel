<?php

namespace App\Policies\Events;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TriviaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function access(User $user)
    {


        return $user->role == 'premium';


    }

}
