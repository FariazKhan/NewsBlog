<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\Roles;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Roles::all();
        return view('admin.profile.show')->with(compact('roles'));
    }

    public function fetchProfileData()
    {
        return User::find(Auth::user()->id);
    }

    public function updateProfileImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:5000'
        ], 
        [
            'image.required' => 'The image is required.',
            'image.image' => 'The image is of invalid format.',
            'image.max' => 'The image size must be within 5000 Kilobytes.'
        ]);

        $var = User::find(Auth::user()->id);

        if ($request->image)
        {
            @unlink('admin/images/uploads/user' . $inject->image);
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
                $originalImage->move(public_path('admin/images/uploads/user'), $fileName);
                $var->image = $fileName;
            }
        }
        $var->save();
        return back()->with('success', 'success');
    }

    public function updateProfileSettings(Request $request)
    {
        $this->validate($request, [
            'name' => 'present',
            'email' => 'present|email',
        ], [
            'name.present' => 'The name field is required.',
            'email.present' => 'The email field is required.',
            'email.unique' => 'The email address is already in use.',
            'email.email' => 'The email field is required.',
            'role.present' => 'The role field is required.',
        ]);
        $id = Auth::user()->id;
        $var = User::find($id);
        if(strcmp($request->name, $var->name) === 0 && strcmp($request->email, $var->email) === 0)
        {
            return ['title' => 'Error!', 'text' => 'The email address is already in use.', 'icon' => 'error'];
        }
        $var->name = $request->name;
        $var->email = $request->email;
        $var->name = $request->name;
        $var->save();
        return ['title' => 'Success!', 'text' => 'Profile updated sucecssfully. Refresh the page to see changes', 'icon' => 'success'];
    }

    public function updatePwd(Request $request)
    {
        $this->validate($request, [
            'oldpwd' => 'required|min:8',
            'newpwd' => 'required|min:8',
            'confpwd' => 'required|min:8|same:newpwd',
        ], [
            'oldpwd.required' => 'The password field is empty.',
            'newpwd.required' => 'The new password field is empty.',
            'confpwd.required' => 'The confirm password field is empty.',
            'confpwd.same' => 'The passwords does not match.',
            'oldpwd.min' => 'The password is invalid.',
            'newpwd.min' => 'The password must be of minimum 8 characters.',
            'confpwd.min' => 'The password must be of minimum 8 characters.',
        ]);

        $data = User::find(Auth::user()->id);
        if(Hash::check($request->oldpwd, $data->password))
        {
            $data->password = Hash::make($request->confpwd);
            $data->save();
            return ['title' => 'Success!', 'text' => 'Password updated successfully.', 'icon' => 'success'];
        }
        else
        {
            return ['title' => 'Error!', 'text' => 'The password is incorrect!', 'icon' => 'error'];
        }
    }
}
