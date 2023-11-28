<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
//import Gate Facade
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

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
        Paginator::useTailwind();

        //use simple tailwind
//        Paginator::defaultView('pagination::simple-tailwind');

        //define a gate for only admin users
        Gate::define('admin', function (User $user) {
            if (!$user?->isAdmin()) {
                abort(Response::HTTP_FORBIDDEN);
            }else{
                return true;
            }
        });
    }
}
