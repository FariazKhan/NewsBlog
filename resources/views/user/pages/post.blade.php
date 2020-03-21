@extends('user.master')

@section('content')

        <div class="col-md-6 post-info-container p-3">
            <h4 class="post-info-header">{{ $dat->title }}</h4>
            <small class="font-quicksand mr-3"><i class="fas fa-user-tie"></i> {{ $dat->posted_by }}</small>
            <small class="font-quicksand"><i class="far fa-calendar-alt"></i> {{ $dat->created_at->diffForHumans() }}</small>
            <br>
            <br>
            {!! $dat->body !!}
            <br>
            <div class="col-md-10 mx-auto bottom-navigation row">
                @if (!is_null($previous))
                    <a class="col-md-6" href="{{ $previous->title }}">
                        <p>&larr; Previous: {{ Str::limit($previous->title, 25, '...') }}</p>
                    </a>
                @else
                    <a class="col-md-6">No more posts before</a>
                @endif
                @if (!is_null($next))
                    <a class="col-md-6" href="{{ $next->title }}">
                        <p>Next: {{ Str::limit($next->title, 25, '[...]') }} &rarr;</p>
                    </a>
                @else
                    <a class="col-md-6">No more posts later</a>
                @endif

            </div>
        </div>
        <hr>
        <div class="col-md-3">
            <div class="container">
                <div class="row">
                    @foreach($sidebar as $p)
                    <div class="col-md-12 clearfix d-flex flex-row mb-3 sidebar-item">
                        <div class="thumbnail-text float-left col-md-6 d-inline">
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
    