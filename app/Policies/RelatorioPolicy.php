<?php

namespace App\Policies;

use App\Models\User;
use App\Http\Constroller\RelatorioController;
use App\Facades\UserPermissions;
use Illuminate\Auth\Access\HandlesAuthorization;

class RelatorioPolicy
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
    public function viewAny(User $user) {

        return UserPermissions::isAuthorized('reports.createReport');
    }
}
