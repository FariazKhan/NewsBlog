@extends('admin.master')
@section('css')
<link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_settings')
active
@endsection
@section('content')
<div class="row">

    <br/>
    <div class="col-md-12">

        <form action="{{ route('user.update', $val->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit the user:
                        </h2>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            @if(session('low_pwd'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Error!</h4>
                                    The password must be of minimum 8 characters.
                                </div>
                            @endif
                            @if(session('unmatched_pwd'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    The passwords does not match.
                                </div>
                            @endif
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="name">Enter the name of the user:</label>
                                        <input type="text" class="form-control" placeholder="Enter the name of the user here..." name="name" id="name" value="{{ $val->name}} ">
                                    </div>
                                    <p class="text-danger">{{$errors->first('name')}}</p>
                                </div>
                                <br>
                                {{--  <input type="hidden" value="{{ Auth::user()->id }}" name="posted_by">  --}}
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="email">Enter the email address of the user:</label>
                                        <input type="email" class="form-control" placeholder="Enter the email address of the user here..." name="email" id="email" value="{{ $val->email}} ">
                                    </div>
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                </div>
                                <br>
                                <div class="form-group">
                                    @if($roles != null)
                                    <label for="category">Select the role of the user:</label>
                                    <br>
                                    <select name="role" id="role" class="mdb-select md-form" >
                                        <option value="" selected disabled>-- Select A Role --</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role_name_formal }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{$errors->first('role')}}</p>
                                    @elseif($roles == null && strcmp($val->role, 1) == 0)

                                        <p>There is only one super admin account in the system. Please add one more account to edit role.</p>
                                    @endif
                                </div>
                                

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="image">Profile Image:</label>
                                    <p>* Please edit the profile image from the <a href="{{ route('profile.index') }}">profile</a> section of the user. For now, the previous profile image will be used</p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter the password of the user here..." name="password" id="password">
                                    </div>
                                    <p class="text-danger">{{$errors->first('password')}}</p>
                                    
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="password">Confirm password:</label>
                                        <input type="conf_password" class="form-control" placeholder="Enter the password of the user here..." name="conf_password" id="conf_password">
                                    </div>
                                    <p class="text-danger">{{$errors->first('conf_password')}}</p>
                                    <p class="text-danger">{{$errors->first('unmatched_pwd')}}</p>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12 align-center">
                                <p class="text-danger font-play">{{ $errors->first('sameValue') }}</p>

                                <p class="text-danger">{{$errors->first('low_pwd')}}</p>
                                <p class="text-danger">{{$errors->first('unmatched_pwd')}}</p>
                                <p class="text-danger">{{$errors->first('invalidpwd')}}</p>
                            </div>
                            <p class="align-center"><strong>* Edit only the fields you need to edit. Leave other fields as they are.</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="footer">
                    <div class="container-fluid">
                        <br>
                        <a href="{{ route('user.index') }}" class="pull-left btn btn-info waves-effect">Go Back</a>
                        <button type="submit" class="pull-right btn btn-success waves-effect">Submit >></button>
                    </div>
                    <br>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
@section('script')
<script>
	
    $(document).ready(function($) {
		$('.select').select();
	});
</script>
@endsection
