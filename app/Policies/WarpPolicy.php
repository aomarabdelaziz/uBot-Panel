<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WarpPolicy
{
    use HandlesAuthorization;

    public function save(User $user)
    {

        return $user->role == 'premium';


    }
}
