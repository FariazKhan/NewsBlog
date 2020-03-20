@extends('user.master')

@section('content')
<div class="container">

    <div class="col-md-8 col-6 ml-5 float-left post-info-container">
        <h4 class="post-info-header">{{ $dat->title }}</h4>
        <small class="font-quicksand mr-3"><i class="fas fa-user-tie"></i> {{ $dat->posted_by }}</small>
        <small class="font-quicksand"><i class="far fa-calendar-alt"></i> {{ $dat->created_at->diffForHumans() }}</small>
        <br>
        <br>
        {!! $dat->body !!}
    </div>
    
    <div class="col-md-3 col-6 float-right d-none d-md-block">
        <div class="row">
            @foreach($sidebar as $p)
            <div class="col-md-12 col-3 clearfix d-flex flex-row mb-3">
                <div class="thumbnail-text float-left col-md-6 d-inline text-truncate">
                    <p class="font-slipi d-inline">{{ $p->title }}</p>
                </div>
                <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="d-inline float-right col-md-6 col-6" alt="Failed to load image" style="max-width: 50%;">
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
    