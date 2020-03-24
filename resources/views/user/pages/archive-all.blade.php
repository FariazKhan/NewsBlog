@extends('user.master')

@section('content')

<div class="col-md-6">
    <h3 class="font-quicksand">All Archives:</h3>
    <hr>
    <div class="row">
        
        @foreach ($archives as $a)    
        <div class="col-md-5 archive row">
            <div class="header bg-info text-center font-play" style="max-height: 20px; width: 100%;">
                {{ $a->name }}
            </div>
            <?php $posts = $a->posts ?>
            @if (count($posts) == 0)
                There are no posts in this archive currently...
            @endif
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

<div class="col-md-3 container pl-5">
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

@endsection
