<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\admin\Post;
use App\admin\Roles;
use Hash;
use Auth;
use Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.show')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('admin.user.create')->with(compact('roles'));
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'conf_password' => 'required|same:password|min:8',
            'role' => 'required|exists:role_data,role_id',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'role.required' => 'The role field is required.',
            'role.exists' => 'The role is invalid.',
            'password.required' => 'The password field is required.',
            'conf_password.required' => 'The confirm password field is required.',
            'conf_password.same' => 'The passwords does not match.',
            'password.min' => 'The password must be of minimum 8 characters.',
            'conf_password.min' => 'The password must be of minimum 8 characters.',
            'email.unique' => 'The email address of the user is already in use.',
        ]);

        $inject = new User;
        $inject->name = $request->name;
        $inject->email = $request->email;
        $inject->image = 'default.jpg';
        $inject->num_of_posts = 0;
        $inject->password = Hash::make($request->conf_password);
        $inject->role = $request->role;
        $inject->save();
        return redirect(route('user.index'))->with('insertion', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('posted_by', '=', User::find($id)->name)->get();
        $total_likes = 0;
        foreach ($posts as $key)
        {
            $total_likes += $key->like;
        }
        if($posts->count() == 0)
        {
            $average_likes = 0;
        }
        else
        {
            $average_likes = $total_likes / $posts->count();
            $average_likes = round($average_likes, 3);
        }
        $var = User::find($id);
        return view('admin.user.view')->with(compact('var', 'average_likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $num = User::where('role', '=', 1)->count();
        // if ($num <= 1 && strcmp($id, User::find($id)->role) == 0 )
        // {
        //     $roles = null;
        //     $val = User::find($id);
        //     return view('admin.user.edit')->with(compact('roles', 'val'));
        // }
        // else
        // {
        //     $roles = Roles::all();
        //     $val = User::find($id);
        //     return view('admin.user.edit')->with(compact('val', 'roles'));
        // }

        $val = User::find($id);
        $num = User::where('role', '=', '1')->count();
        if ($num <= 1 && strcmp($val->role, 1) == 0)
        {
            $roles = null;
            return view('admin.user.edit')->with(compact('val', 'roles'));
        }
        else
        {
            $roles = Roles::all();
            return view('admin.user.edit')->with(compact('val', 'roles'));
        }
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
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'role' => 'required|exists:role_data,role_id',
            // 'password' => 'present|min:8',
            // 'conf_password' => 'present|min:8|same:password',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'role.required' => 'The role field is required.',
            'role.exists' => 'The role is invalid.',
            'email.unique' => 'The email address of the user is already in use.',
            // 'password.present' => 'The password field is required.',
            // 'conf_password.present' => 'The confirm password field is required.',
            // 'conf_password.same' => 'The passwords does not match.',
            // 'password.min' => 'The password must be of minimum 8 characters.',
            // 'conf_password.min' => 'The password must be of minimum 8 characters.',
        ]);

        $inject = User::find($id);
        if (isset($request->password) && isset($request->conf_password)) {
            if (strcmp($request->password, $request->conf_password)) {
                $validator = Validator::make([], []); // Empty data and rules fields
                $validator->errors()->add('unmatched_pwd', 'Error: The passwords do not match.');
                throw new ValidationException($validator);
            }

            if (strlen($request->password) < 8 || strlen($request->conf_password) < 8) {
                $validator = Validator::make([], []); // Empty data and rules fields
                $validator->errors()->add('lowPwd', 'Error: The password must be at least 8 characters.');
                throw new ValidationException($validator);
            }

            if (strcmp($request->password, '') == 0 || strcmp($request->password, ' ') == 0 || strcmp($request->conf_password, '') == 0 || strcmp($request->conf_password, ' ') == 0) {
                $validator = Validator::make([], []); // Empty data and rules fields
                $validator->errors()->add('invalidpwd', 'Error: The password is invalid.');
                throw new ValidationException($validator);
            }
            $inject->password = Hash::make($request->password);
        }
        
        $inject->name = $request->name;
        $inject->email = $request->email;
        $inject->image = $inject->image;
        $inject->num_of_posts = 0;
        $inject->role = $request->role;
        $inject->save();
        return redirect(route('user.index'))->with('edtSuccess', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('dltSuccess', 'success');
    }
}
