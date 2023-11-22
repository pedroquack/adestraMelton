<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Postagem;
use App\Facades\UserPermissions;   

class PostagemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) {
        return UserPermissions::isAuthorized('postagem.index');
    }

    public function view(User $user, Postagem $postagem) {

        return UserPermissions::isAuthorized('postagem.show');
    }

    public function create(User $user) {

        return UserPermissions::isAuthorized('postagem.create');
    }

    public function update(User $user, Postagem $postagem) {
        return UserPermissions::isAuthorized('postagem.edit');
    }

    public function delete(User $user, Postagem $postagem) {
        return UserPermissions::isAuthorized('postagem.destroy');
    }
}
