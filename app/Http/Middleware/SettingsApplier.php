<?php

namespace App\Http\Middleware;

use Closure;
use App\admin\Settings;
use Illuminate\Support\Facades\View;

class SettingsApplier
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
        $settings = Settings::all()->first();
        View::share('settings', $settings);
        return $next($request);
    }
}
