<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\admin\Roles;
use Auth;
use Illuminate\Support\Facades\View;

class CheckAdminRole
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

        $roles = Roles::all();
        foreach ($roles as $r)
        {
            if (Auth::user()->role == $r->role_id)
            {
                View::share('role_id', $r->role_id);
                View::share('role_name', $r->role_name_short);
                View::share('role_name_formal', $r->role_name_formal);
            }
        }
        // if (Auth::user()->role == 1)
        // {
        //     View::share('role', 'super_admin');
        // }
        // elseif (Auth::user()->role == 2)
        // {
        //     View::share('role', 'sub_admin');
        // }
        // elseif (Auth::user()->role == 3)
        // {
        //     View::share('role', 'user');
        // }
        // elseif (Auth::user()->role == null)
        // {
        //     View::share('role', 'null');
        // }
        return $next($request);
    }
}
