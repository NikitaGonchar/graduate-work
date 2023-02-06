<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
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

    public function edit(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id;
    }

    public function delete(User $user, Advert $advert)
    {
        return $user->id === $advert->user_id or $user->role === 'admin';
    }
}
