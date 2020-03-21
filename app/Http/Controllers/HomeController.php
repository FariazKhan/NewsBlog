<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\Post;
use App\admin\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->middleware('fetch_view_side_data');
    }

    public function index()
    {
        
        return view('user.pages.home');
    }

    public function admin()
    {
    }

    public function showArchive($archive)
    {
        $archive = Categories::where('slug', '=', $archive)->get()->first();
        $dat = Post::where('categories_id', '=', $archive->id)->paginate(2);
        // return $dat;
        return view('user.pages.archive')->with(compact('dat', 'archive'));
    }

    public function showAllArchive()
    {
        $archive = Categories::all();
        return view('user.pages.archive-all');
    }

    public function showPost($title)
    {
        $dat = Post::where('title', '=', $title)->get()->first();
        $previous = Post::where('id', '<', $dat->id)->get()->last();
        $next = Post::where('id', '>', $dat->id)->get()->first();
        return view('user.pages.post')->with(compact('dat', 'previous', 'next'));
    }
}
