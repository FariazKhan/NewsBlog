@extends('user.master')

@section('content')

        <div class="col-md-6 post-info-container offset-md-2 p-xs-2">
            <h4 class="post-info-header">{{ $dat->title }}</h4>
            <br>
            <br>
            {!! $dat->body !!}
            <br>
        </div>
        <hr>
        <div class="col-md-3">
            <div class="container">
                <div class="row">
                    @foreach($sidebar as $p)
                    <div class="col-md-12 sidebar-card">
                        <div class="row">
                            <div class="img-container bg-dark col-md-5 col-sm-6 col-6 float-left" style="width: 50%;">
                                <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="img rounded" alt="">
                            </div>
                            <div class="thumbnail-text col-md-6 col-sm-6 col-5">
                                <p class="column-no-left-padding font-muktiregular">{{ $p->title }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection

@section('customScript')
    <script>
        $('.post-info-container').find('img').addClass('post-images');
        $('.post-info-container').find('p').addClass('post-text');
    </script>
@endsection
    