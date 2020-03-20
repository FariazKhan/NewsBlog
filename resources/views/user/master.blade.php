<!DOCTYPE html>
<html lang="mul">
@include('user.inc.head')
<body>
    <!--Parent Div-->
    <div class="wrapper container-fluid">
        <!--Parent Row-->
        <div class="row">
            
            <!-- Topbar -->
            @include('user.inc.topbar')
            <!-- Topbar Ends-->
            
            <!-- Main Nav -->
            @include('user.inc.navbar')
            <!-- Main Nav Ends -->
            
            <!-- Content Area-->
            <br>
            <br>
            <div class="container-fluid main-content">
                <br>
                <div class="row">
                    <!-- Card-like feeds -->
                    <div class="col-md-6 post-holder">
                        @yield('top-news')
                        
                        <br>
                        <br>
                    </div>
                    
                    @yield('sidebar')
                    
                    <!-- Post Cards -->
                    <br>
                    <br>
                    <div class="post-area">
                        <div class="row combined-postbox">
                            @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- Post Cards Ends -->
                </div>
                
                
                <!-- Content Area Ends-->
            </div>
            <br>
            
            <!-- Footer Starts -->
            @include('user.inc.footer')
            <!-- Footer Ends -->
            
        </div>
        
        <!-- Scripts -->
        @include('user.inc.script')
        <!-- Scripts Ends -->
    </body>
    </html>