@extends('admin.master')

@section('profile')
active
@endsection

@section('content')

<section class="col-md-12">
    <div class="container-fluid">
        <div class="row clearfix">

            {{-- Alert messages: --}}
            @if (session('img_not_supp'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Error!</h4>
                    The image is not supported.
                    Supported image formats: jpg, png, bmp, gif, jpeg.
                </div>
            @endif

            @if (session('img_not_supp'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Error!</h4>
                    The image is not supported.
                    Supported image formats: jpg, png, bmp, gif, jpeg.
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    Image updated successfuly.
                </div>
            @endif

            @if($errors->first('image'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-times"></i> Error!</h4>
                    {{ $errors->first('image') }}
                </div>
            @endif
            {{-- Alert messages ends --}}

            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <br>
                    <br>
                    <div class="profile-body">
                        <div class="image-area" style="display: flex;align-items: center;justify-content: center;">
                            <img class="img-responsive" style="max-width: 150px;height: 150px;" src="{{ asset('admin/images/uploads/user/' . Auth::user()->image) }} " alt="Image not found or failed to load." />
                        </div>
                        <div class="content-area">
                            <h3 id="username">{{-- Auth::user()->name --}}</h3>
                            <p id="role">{{ App\admin\Roles::where('role_id','=',Auth::user()->role)->get()->first()->role_name_formal }} </p>
                            <p id="image_modal_toggler" style="cursor: pointer;"><i class="fas fa-pencil-alt"></i> Edit Photo </p>
                            <p></p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Joined</span>
                                <span>{{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d M, Y') }}</span>
                            </li>
                            <li>
                                <span>Posts</span>
                                <span id="num_of_posts">{{ Auth::user()->num_of_posts }}</span>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                            </ul>
                            
                            <div class="tab-content">
                                
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal" enctype="multipart/form-data" id="profile_form">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="The username..." value="{{ Auth::user()->name }}" required>
                                                </div>
                                                <small>* The name must be written in a formal way.</small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="The email address..." value="{{ Auth::user()->email }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" id="profile-submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" id="updatePwdForm">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword" name="oldpwd" placeholder="Old Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="newpwd" placeholder="New Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="confpwd" placeholder="New Password (Confirm)">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="button" class="btn btn-danger" id="updatePwdBtn">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="updateImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Current Profile Image:</h5>
                    <div style="display: flex; width: 100%;">
                        <img class="img img-thumbnail" style="align-self: center;" src="{{ asset('admin/images/uploads/user/' . Auth::user()->image) }} " alt="Image not found or failed to load." />
                    </div>
                    <form action="{{ route('updateProfileImage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Profile Image</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="file" id="image" name="image">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {'X-Csrf-Token' : '{{ @csrf_token() }}'}
        });

       function getProfileData(){
            $.ajax({
                type: 'post',
                url: '{{ route("fetchProfileData") }}',
                success: function(dat){
                    $('#username').html(dat.name);
                    $('#num_of_posts').html(dat.num_of_posts);
                }
            });
        };
        $(document).ready(function(){
            getProfileData();
        });

        $('#image_modal_toggler').click(function(e){
            $('#updateImageModal').modal('show');
        });

        $('#profile-submit').click(function(e){
            var data = $('#profile_form').serialize();
            $.ajax({
                url: '{{ route("updateProfileSettings") }}',
                type: 'POST',
                data: data,
                success: function(e){
                    Swal.fire({
                        title: e.title,
                        text: e.text,
                        icon: e.icon
                    });
                },
                error: function(e){
                    $.each(e.responseJSON.errors, function(key,value) {
                        toastr.error(value);
                    }); 
                }
            });
        });

        $('#updatePwdBtn').click(function(e){
            var data = $('#updatePwdForm').serialize();
            $.ajax({
                url: '{{ route("updatePwd") }}',
                type: 'POST',
                data: data,
                success: function(e){
                    Swal.fire({
                        title: e.title,
                        text: e.text,
                        icon: e.icon
                    });
                },
                error: function(e){
                    $.each(e.responseJSON.errors, function(key,value) {
                        toastr.error(value) + '\n';
                    }); 
                }
            });
        });
    </script>
@endsection