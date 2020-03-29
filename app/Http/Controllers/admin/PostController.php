<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\Post;
use App\admin\Categories;
use App\Mail\SubscriptionMails;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role > 2)
        {
            $val = Post::where('posted_by', '=', Auth::user()->name)->get();
            return view('admin.post.show')->with(compact('val'));
        }
        else
        {
            $val = Post::all();
            return view('admin.post.show')->with(compact('val'));
        }
    }

    public function create()
    {
        $cat = Categories::all();
        return view('admin.post.create')->with(compact('cat'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'status' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'body' => 'required',
        ], [
            'title.required' => 'The title is required',
            'subtitle.required' => 'The subtitle is required',
            'image.required' => 'The image is required',
            'body.required' => 'The body is required',
            'status.required' => 'The post status is required',
            'categories.required' => 'The post category is required',
            ]);
        
        $inject = new Post;
        $inject->title = $request->title;
        $inject->subtitle = $request->subtitle;
        $inject->status = $request->status;
        $inject->posted_by = Auth::user()->name;
        $inject->categories_id = $request->categories;
        $inject->body = $request->body;
        $inject->views = 0;

        // Image Upload
        if ($request->image)
        {
            $originalImage = $request->image;
            $extension = $originalImage->getClientOriginalExtension();
            $permitted =  array('jpg', 'png', 'bmp', 'gif', 'jpeg');
            if (!in_array($extension, $permitted))
            {
                return back()->with('img_not_supp');
            }
            else
            {
                $fileName = uniqid() . '.' . $extension;
                $originalImage->move(public_path('user/images/uploads/post'), $fileName);
                $inject->image = $fileName;
            }
        }
        $inject->save();
        $user = User::find(Auth::user()->id);
        $user->num_of_posts = $user->num_of_posts + 1;
        $user->save();
        // Mail::to('fariazkhan19@email.com')->send(new SubscriptionMails());
        return redirect(route('post.index'))->with('insertion', 'success');
    }


    public function show($id)
    {
        $data = Post::find($id);
        return view('admin.post.view')->with(compact('data'));
    }


    public function edit($id)
    {
        $val = Post::find($id);
        $cat = Categories::all();
        return view('admin.post.edit')->with(compact('val', 'cat'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'status' => 'required',
            'body' => 'required',
        ], [
            'title.required' => 'The title is required',
            'subtitle.required' => 'The subtitle is required',
            'image.present' => 'The image is required',
            'body.required' => 'The body is required',
            'status.required' => 'The post status is required',
        ]);

        $inject = Post::find($id);
        $inject->title = $request->title;
        $inject->subtitle = $request->subtitle;
        $inject->status = $request->status;
        $inject->posted_by = Auth::user()->name;
        $inject->body = $request->body;
        if(!$request->hasFile('image'))
        {
            $inject->image = $inject->image;
        }

        // Image Upload
        if ($request->image) {
            @unlink('user/images/uploads/post'. $inject->image);
            $originalImage = $request->image;
            $extension = $originalImage->getClientOriginalExtension();
            $permitted =  array('jpg', 'png', 'bmp', 'gif', 'jpeg');
            if (!in_array($extension, $permitted))
            {
                return back()->with('img_not_supp');
            }
            else
            {
                $fileName = uniqid() . '.' . $extension;
                $originalImage->move(public_path('user/images/uploads/post'), $fileName);
                $inject->image = $fileName;
            }

        }
        $inject->save();
        return redirect(route('post.index'))->with('edtSuccess', 'success');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return back()->with('dltSuccess', 'success');
    }
}
