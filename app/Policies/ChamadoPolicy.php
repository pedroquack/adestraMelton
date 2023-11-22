<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chamado;
use App\Facades\UserPermissions;    
use Illuminate\Auth\Access\HandlesAuthorization;

class ChamadoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) {
        return UserPermissions::isAuthorized('chamado.index');
    }

    public function view(User $user, Chamado $chamado) {

        return UserPermissions::isAuthorized('chamado.show');
    }

    public function create(User $user) {

        return UserPermissions::isAuthorized('chamado.create');
    }

    public function update(User $user, Chamado $chamado) {

        return UserPermissions::isAuthorized('chamado.edit');
    }

    public function delete(User $user, Chamado $chamado) {

        return UserPermissions::isAuthorized('chamado.destroy');
    }
}
