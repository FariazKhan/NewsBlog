<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\View;

class SuperAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $super_admin = User::where('role', '=', 1)->get()->count();
        if($super_admin < 2)
        {
            // View::share('super');
        }
        return $next($request);
    }
}
