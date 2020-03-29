<?php

namespace App\Http\Middleware;

use Closure;
use App\admin\Post;
use App\admin\Categories;
use App\admin\Pages;
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
        $pages = Pages::all();
        $posts = Post::where('status', '=', 1)->get()->take(15);
        $all_posts = Post::where('status', '=', 1)->paginate(5);
        $sidebar = Post::where('status', '=', 1)->get()->take(5);
        $latest_post = Post::latest()->first();

        View::share('archives', $archives);
        View::share('pages', $pages);
        View::share('posts', $posts);
        View::share('all_posts', $all_posts);
        View::share('sidebar', $sidebar);
        View::share('latest_post', $latest_post);
        return $next($request);
    }
}
