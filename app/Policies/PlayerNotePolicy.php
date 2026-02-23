<?php

namespace App\Policies;

use App\Models\User;

class PlayerNotePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->can('create notes');
    }
}
