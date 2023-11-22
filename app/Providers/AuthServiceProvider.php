<?php

namespace App\Providers;

use App\Models\Chamado;
use App\Policies\ChamadoPolicy;
use App\Models\Relatorio;
use App\Policies\RelatorioPolicy;
use App\Models\Postagem;
use App\Policies\PostagemPolicy;
use App\Models\Comentario;
use App\Policies\ComentarioPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Chamado::class => ChamadoPolicy::class,
        Relatorio::class => RelatorioPolicy::class,
        Postagem::class => PostagemPolicy::class,
        Comentario::class => ComentarioPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
