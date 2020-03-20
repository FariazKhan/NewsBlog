<!DOCTYPE html>
<html>

@include('admin.inc.head')
@yield('css')


<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    @include('admin.inc.nav')
    <!-- #Top Bar -->
    @include('admin.inc.sidebar')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                {{-- <h2>DASHBOARD</h2> --}}
            </div>

            {{--------------- Main Content Area ---------------}}
            @yield('content')
            {{--------------- Main Content Area Ends--------------- }}

        </div>
    </section>

    {{-- All JavaScripts --}}
    @include('admin.inc.script')
    @yield('script')

</body>

</html>
