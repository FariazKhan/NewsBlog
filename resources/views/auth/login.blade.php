<html>
@include('admin.inc.head')

<body class="login-page">    
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>Daily News Bangla</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Sign in to your dashboard</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="Your Email..." class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        {{-- <p class="text-danger"> @error('email') Invalid email address. @enderror </p> --}}
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" placeholder="Your Password..." class="form-control" name="password" required>
                        </div>
                        <p class="text-danger"> @error('password') Invalid password. @enderror </p>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block bg-pink waves-effect" type="submit">LOG IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-md-12 text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.inc.script')
    <!-- Validation Plugin Js -->
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.js')}}"></script>
    
    <!-- Custom Js -->
    <script src="{{ asset('admin/js/admin.js')}}"></script>
    <script src="{{ asset('admin/js/pages/examples/sign-in.js')}}"></script>
</body>    



</html>