@extends('user.master')
@section('content')
    
<div class="col-md-7">
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
   <br>
   <br>
    <!-- Main Card-Like posts -->
    @foreach ($all_posts as $p)
        <div class="col-md-10 ml-2 row blog-card">
            <div class="meta">
                <div class="photo" style="background-image: url({{asset('user/images/uploads/post/' . $p->image)}})"></div>
                <ul class="details">
                    <li class="author"><a href="#">{{ $p->posted_by }}</a></li>
                    <li class="date">{{ $p->created_at->format('d M') }}</li>
                    <li class="tags">
                    <ul>
                        {{ App\admin\Categories::where('id', '=', $p->categories_id)->get()->first()['name'] }}
                    </ul>
                    </li>
                </ul>
            </div>
            <div class="description">
                <h1>{{ $p->title }}</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
                <p class="read-more">
                    <a href="{{ route('showPost', $p->title) }}">Read More</a>
                </p>
            </div>
{{--        
            <br>
            <br> --}}
            {{-- <div class="col-md-6 pt-3">
                <p class="text-center font-ekushe">In {{ $p->category['name'] }} archive</p>
                <h3 class="font-teesta">{{ $p->title }}</h3>
                <a class="btn btn-info card-link m-0" href="{{ route('showPost', $p->title) }}">Read More &rarr;</a>
            </div> --}}
            <br>
        </div>
    @endforeach
    {{ $all_posts->links() }}
    <!-- Main Card-Like posts Ends-->

</div>
<div class="col-md-3">
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

{{-- 
@section('sidebar')
    <!-- sidebar1 -->
    <!-- sidebar1 ends -->
                        
    <!-- sidebar2-->
    @include('user.inc.sidebar2')
    <!-- sidebar2 ends -->
@endsection --}}
