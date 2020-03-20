<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Categories;
use App\admin\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cat = Categories::all();
        $data = Settings::all()->first();
        return view('admin.settings.show')->with(compact('cat', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'blog_name' => 'required',
            'blog_slogan' => 'required',
            'blog_copyright' => 'required',
            'blog_meta' => 'required',
            'blog_logo' => 'image',
        ],
        [
            'blog_name.required' => 'The blog name is required.',
            'blog_slogan.required' => 'The blog slogan is required.',
            'blog_copyright.required' => 'The copyright text is required.',
            'blog_meta.required' => 'The blog meta text is required.',
            'blog_logo.image' => 'The favicon/logo must be a valid image.',
        ]);

        $inject = Settings::all()->first();
        $inject->blog_name = $request->blog_name;
        $inject->blog_slogan = $request->blog_slogan;
        $inject->blog_copyright = $request->blog_copyright;
        $inject->blog_meta = $request->blog_meta;
        // Image Upload
        if ($request->blog_logo) {
            $originalImage = $request->blog_logo;
            $extension = $originalImage->getClientOriginalExtension();
            $permitted =  array('jpg', 'png', 'ico', 'gif', 'jpeg', 'svg');
            if (!in_array($extension, $permitted))
            {
                return back()->with('img_not_supp');
            }
            else
            {
                $fileName = uniqid() . '.' . $extension;
                $originalImage->move(public_path('admin/uploads/settings'), $fileName);
                $inject->blog_logo = $fileName;
            }
        }
        $inject->save();
        return back()->with('update-success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCategory(Request $request, $id)
    {
        Categories::find($id)->delete();
        return ['message' => 'Successfully deleted category.'];
    }

    public function editCategory(Request $request)
    {
        if ($request->has('catid'))
        {
            $this->validate($request, [
                'catname' => 'required',
                'catslug' => 'required'
            ], [
                'catname.required' => 'The name field is required.',
                'catslug.required' => 'The slug field is required.',
            ]);
    
            $var = Categories::find($request->catid);
            $var->name = $request->catname;
            $var->slug = $request->catslug;
            $var->save();
            return ['title' => 'Success!', 'body' => 'Category updated successfully!', 'icon' => 'success'];

        }
        else
        {
            return ['title' => 'Error!', 'body' => 'Invalid request', 'icon' => 'error'];
        }
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'catname' => 'required',
            'catslug' => 'required'
        ], [
            'catname.required' => 'The name field is required.',
            'catslug.required' => 'The slug field is required.',
        ]);

        $var = new Categories;
        $var->name = $request->catname;
        $var->slug = $request->catslug;
        $var->save();
        return ['title' => 'success'];
    }

    public function fetchCategories(Request $request)
    {
        $data = Categories::all();
        return $data;
    }
}
