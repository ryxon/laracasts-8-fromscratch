<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class AdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user is an admin
        Gate::authorize('admin');
        //defines in app/Providers/AppServiceProvider.php:boot()
//        Gate::define('admin', function (User $user) {
//            if (!$user?->isAdmin()) {
//                abort(Response::HTTP_FORBIDDEN);
//            }else{
//                return true;
//            }
//        });

        return $next($request);
    }
}
