<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\Settings;
use App\admin\TopScrollbar;

class TopScrollbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $color = Settings::find(1)->top_scrollbar_color;
        $txtcolor = Settings::find(1)->top_scrollbar_text_color;
        $contents = TopScrollbar::all();
        return view('admin.widgets.scroll')->with(compact('color', 'txtcolor', 'contents'));
    }

    public function setBG(Request $request)
    {
        $this->validate($request, [
            'color' => 'required'
        ], [
            'color.required' => 'The color field is required.'
        ]);
        
        $data = Settings::find(1);
        $data->top_scrollbar_color = $request->color;
        $data->save();
        return ["title" => "Success", "text" => "Color updated successfully!", "icon" => "success"];
    }

    public function setTextColor(Request $request)
    {
        $this->validate($request, [
            'text_color' => 'required'
        ], [
            'text_color.required' => 'The color field is required.'
        ]);
        
        $data = Settings::find(1);
        $data->top_scrollbar_text_color = $request->text_color;
        $data->save();
        return ["title" => "Success", "text" => "Text Color updated successfully!", "icon" => "success"];
    }

    public function fetchData(Request $request)
    {
        $data = TopScrollbar::all();
        return $data;
    }

    public function updateContent(Request $request)
    {
        if ($request->has('dataid'))
        {
            $this->validate($request, [
                'dataid' => 'required',
                'datatitle' => 'required',
                'datalink' => 'required',
            ], [
                'dataid.required' => 'This field is required.',
                'datatitle.required' => 'This field is required.',
                'datalink.required' => 'This field is required.',
            ]);

            $data = TopScrollbar::find($request->dataid);
            $data->title = $request->datatitle;
            $data->link = $request->datalink;
            $data->save();
            return ['title' => 'Success', 'text' => 'Content updated successfully.', 'icon' => 'success'];
        }
    }

    public function storeContent(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'This field is required.',
            'link.required' => 'This field is required.',
        ]);

        $inject = new TopScrollbar;
        $inject->title = $request->title;
        $inject->link = $request->link;
        $inject->save();

        return ['title' => 'Success', 'text' => 'Content added successfully.', 'icon' => 'success'];   
    }

    public function deleteContent(Request $request)
    {
        if($request->has('id'))
        {
            TopScrollbar::find($request->id)->delete();
            return ['title' => 'Success!', 'text' => 'Content deleted successfully!', 'icon' => 'success'];

        }
        else
        {
            return ['title' => 'Failed!', 'text' => 'Invalid request.', 'icon' => 'error'];
        }
    }
}
