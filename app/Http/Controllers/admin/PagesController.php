<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\admin\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('fetch_view_side_data');
     }

    public function index()
    {
        $val = Pages::all();
        return view('admin.pages.show')->with(compact('val'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'present',
            'body' => 'required',
        ], [
            'title.required' => 'The title is required',
            'slug.present' => 'The subtitle is required',
            'body.required' => 'The body is required',
        ]);

        $inject = new Pages;
        $inject->title = $request->title;
        if (!empty($request->slug))
        {
            $inject->slug = $request->slug;
        }
        else
        {
            $inject->slug = Str::slug($request->title); 
        }
        $inject->status = 1;
        $inject->created_by = Auth::user()->name;
        $inject->body = $request->body;
        $inject->save();
        return redirect(route('pages.index'))->with('insertion', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dat = Pages::find($id);
        return view('user.pages.page')->with(compact('dat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dat = Pages::find($id);
        return view('admin.pages.edit')->with(compact('dat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'present',
            'status' => 'required|boolean',
            'body' => 'required',
        ], [
            'title.required' => 'The title is required',
            'slug.present' => 'The subtitle is required',
            'status.required' => 'The status is required',
            'status.boolean' => 'The value of the field is invalid',
            'body.required' => 'The body is required',
        ]);

        $inject = Pages::find($id);
        $inject->title = $request->title;
        if (!empty($request->slug)) {
            $inject->slug = $request->slug;
        } else {
            $inject->slug = Str::slug($request->title);
        }
        $inject->status = $request->status;
        $inject->created_by = Auth::user()->name;
        $inject->body = $request->body;
        $inject->save();
        return redirect(route('pages.index'))->with('edtSuccess', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pages::find($id)->delete();
        return back()->with('dltSuccess', 'success');
    }
}
