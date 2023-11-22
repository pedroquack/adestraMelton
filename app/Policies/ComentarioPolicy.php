<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Comentario;
use App\Facades\UserPermissions; 

class ComentarioPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) {
        return UserPermissions::isAuthorized('comentario.index');
    }

    public function view(User $user, Comentario $comentario) {

        return UserPermissions::isAuthorized('comentario.show');
    }

    public function create(User $user) {

        return UserPermissions::isAuthorized('comentario.create');
    }

    public function update(User $user, Comentario $comentario) {
        return UserPermissions::isAuthorized('comentario.edit');
    }

    public function delete(User $user, Comentario $comentario) {
        return UserPermissions::isAuthorized('comentario.destroy');
    }

}
