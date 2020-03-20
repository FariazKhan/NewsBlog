<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Error :: Blocked Access</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin/uploads/settings/' . $settings->blog_logo) }}" type="image/{{ substr(strrchr($settings->blog_logo,'.'),1) }}">

    <meta name="description" content="{{ $settings->blog_meta }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        {{-- <div class="error-code">Error!</div>
        <div class="error-message">You have no access to this link.</div> --}}
        <div class="row card" style="width: 100%; height: 400px;">
            <div class="alert-danger col-md-12 text-center d-flex align-self-center" style="height: 100%;">
                <h3 style="color: #ffffff; ">Error!</h3>
                <p style="color: #fff">You don't have permission to access this link.</p>
                <a href="{{ route('home') }}"><button class="btn btn-default btn-lg waves-effect pull-md-5">GO TO HOMEPAGE</button></a>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admin/plugins/node-waves/waves.js') }}"></script>
</body>

</html>