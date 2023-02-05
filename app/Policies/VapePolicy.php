<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vape;
use Illuminate\Auth\Access\HandlesAuthorization;

class VapePolicy
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

    public function edit(User $user, Vape $vape)
    {
        return $user->id === $vape->user_id;
    }

    public function delete(User $user, Vape $vape)
    {
        return $user->id === $vape->user_id or $user->role === 'admin';
    }
}
