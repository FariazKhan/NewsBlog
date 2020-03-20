<?php

namespace App\Http\Middleware;

use Closure;
use App\admin\Post;
use App\admin\Categories;
use Illuminate\Support\Facades\View;

class FetchViewSideData
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
        // Home, nav
        $archives = Categories::all();
        $posts = Post::all();
        $sidebar = Post::all()->take(5);
        $latest_post = Post::latest()->first();

        View::share('archives', $archives);
        View::share('posts', $posts);
        View::share('sidebar', $sidebar);
        View::share('latest_post', $latest_post);
        return $next($request);
    }
}
