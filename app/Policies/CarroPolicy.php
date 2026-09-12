<?php

namespace App\Policies;

use App\Models\Carro;
use App\Models\User;

class CarroPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Carro $carro): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'gerente']);
    }

    public function update(User $user, Carro $carro): bool
    {
        return in_array($user->role, ['admin', 'gerente']);
    }

    public function delete(User $user, Carro $carro): bool
    {
        return $user->role === 'admin';
    }
}
