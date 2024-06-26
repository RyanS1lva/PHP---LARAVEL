<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Mark;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Gate para retornar aos usuários na view somente os pontos registrados pelo seu usuário.
        Gate::define('view-mark', function (User $user, Mark $mark) {
            return $user->id == $mark->user_id;
        });
    }
}
