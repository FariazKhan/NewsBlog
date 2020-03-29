@extends('user.master')

@section('top-news')
    <div class="top-news">
        <img src="{{ asset('user/images/uploads/post/' . $latest_post->image) }}" alt="Image not found or failed to load!">
        <div class="top-news-text">
            <h5 class="image-title">{{ $latest_post->title }}</h5>
            <div class="top-news-info">
                <small><i class="fas fa-user-tie"></i> {{ $latest_post->posted_by }}</small> <br>
                <small><i class="far fa-calendar-alt"></i> {{ $latest_post->created_at->diffForHumans() }}</small>
            </div>
            <br>
            <a class="btn btn-danger read-more-btn d-block" href="{{ route('showPost', $latest_post->title) }}">Read more &rarr;</a>
        </div>
    </div>
@endsection

@section('sidebar')
    <!-- sidebar1 -->
    @include('user.inc.sidebar1')
    <!-- sidebar1 ends -->
                        
    <!-- sidebar2-->
    @include('user.inc.sidebar2')
    <!-- sidebar2 ends -->
@endsection

@section('content')
    <!-- Main Card-Like posts -->
    @include('user.inc.cards')
    
    <div class="col-md-12">
        <div class="col-md-4 mx-auto">
            <a href="{{ route('showAllPosts') }}">
            <button class="btn btn-block btn-info all-post-btn"><i class="far fa-eye"></i>
                <span>View All Posts</span>
            </button>
            </a>
        </div>
        <br>
        <br>
    </div>
    <!-- Main Card-Like posts Ends-->
                            
    <div class="archives row">
    <!-- Archives -->
    @include('user.inc.archives')
    <!-- Archives Ends-->
@endsection