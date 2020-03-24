<!DOCTYPE html>
<html>
@include('user.inc.head')
<body>
    <!--Parent Div-->
    <div class="wrapper container-fluid">
        <!--Parent Row-->
        <div class="row">
            
           
            <!-- Content Area-->
            <br>
            <br>
            <div class="container-fluid main-content">
                <br>
                <h1 class="text-center">{{ config('app.name') }}</h1>
                <p class="text-center mx-auto">Subscription service</p>
                <hr>
                <div class="row">
                    <div class="post-area">
                        <div class="row combined-postbox">
                            <div class="col-md-12 post-info-container p-3">
                                <h4 class="post-info-header">{{ $dat->title }}</h4>
                                <small class="font-quicksand mr-3"><i class="fas fa-user-tie"></i> {{ $dat->posted_by }}</small>
                                <small class="font-quicksand"><i class="far fa-calendar-alt"></i> {{ $dat->created_at->diffForHumans() }}</small>
                                <br>
                                <br>
                                {!! $dat->body !!}
                                <br>
                                
                            </div>
                            <hr>
                            
                            <div class="container">
                                <div class="row mx-auto">
                                    This mail was sent to you beacuse you subscribed to {{ config('app.name') }}. To stop recieving mails, please unsubscribe.
                                </div>
                            </div>
                           
                            
                            
                            @section('customScript')
                            <script>
                                $('.post-info-container').find('img').addClass('post-images');
                                $('.post-info-container').find('p').addClass('post-text');
                            </script>
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- Post Cards Ends -->
            </div>
            
            
            <!-- Content Area Ends-->
        </div>
        <br>
        
       
        
    </div>
    
    <!-- Scripts -->
    @include('user.inc.script')
    <!-- Scripts Ends -->
</body>
</html>
