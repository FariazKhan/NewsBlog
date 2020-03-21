@extends('user.master')

@section('content')

<div class="col-md-7">
    <h3 class="font-quicksand">All Archives:</h3>
    <hr>
    <div class="row">
        
        @foreach ($archives as $a)    
        <div class="col-md-5 archive row">
            <div class="header bg-info text-center font-play" style="max-height: 20px; width: 100%;">
                {{ $a->name }}
            </div>
            <?php $posts = $a->posts ?>
            @foreach ($posts as $post)
            <div class="col-md-12 mb-3" style="border: 1px solid #ddd; border-radius: 5px;">
                <div class="row">
                    <img class="img rounded w-100" style="height: 25% !important; max-height: 25% !important;" src="{{ asset('user/images/uploads/post/'.$post->image) }}" alt="Failed to load image">
                    <br>
                    <br>
                    <div class="text-area col-xs-6 text-center">
                        <p class="font-teesta"><a href="{{ url('posts/' . $post->title) }}">{{ $post->title }}</a></p>
                    </div>
                </div>    
            </div>
            @endforeach
            
        </div>
        
        @endforeach
    </div>
    
</div>

<div class="col-md-3">
    <div class="row">
        @foreach($sidebar as $p)
        <div class="col-md-12 clearfix d-flex flex-row mb-3">
            <div class="thumbnail-text float-left col-md-6 d-inline text-truncate">
                <p class="font-slipi d-inline">{{ $p->title }}</p>
            </div>
            <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="d-inline float-right col-md-6" alt="Failed to load image" style="max-width: 50%;">
        </div>
        @endforeach
    </div>
</div>

@endsection
