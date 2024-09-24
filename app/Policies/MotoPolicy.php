<?php

namespace App\Policies;

use App\Models\Moto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MotoPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Moto $moto): bool
    {
        return $moto->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Moto $moto): bool
    {
        return $this->update($user, $moto);

    }

}
