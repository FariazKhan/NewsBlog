@extends('admin.master')
@section('css')
<link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_post')
active
@endsection
@section('content')
<div class="row">
    <br> 
    <div class="" style="display: flex; justify-content: center;">
        <div class="col-md-7">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="card profile-card">
                <div class="profile-body">
                    <div class="image-area">
                        <img class="rounded zoom" style="margin-top:-100px !important;" width="200px" height="200px" src="{{ asset('admin/images/uploads/user/' . $var->image) }}" alt="Profile image not found or failed to load."/>
                    </div>
                    <div class="content-area">
                        <h3>{{ $var->name }}</h3>
                        <p>{{ $var->email }}</p>
                        <p>{{ App\admin\Roles::where('role_id', '=', $var->role)->get()->first()->role_name_formal }}</p>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>Joined At</span>
                            <span>{{ Carbon\Carbon::parse($var->created_at)->format('d M Y') }}</span>
                        </li>
                        <li>
                            <span>Total Posts</span>
                            <span>{{ $var->num_of_posts }}</span>
                        </li>
                        <li>
                            <span>Average Likes</span>
                            <span>{{ $average_likes }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

