@foreach ($posts as $p)
    <div class="col-md-2 post-card post-card-home">
        <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="img" alt="Failed to load image"> 
        <br>
        <br>
        <p class="text-center font-play">In {{ $p->category['name'] }} archive</p>
        <h4 class="font-shondip ml-1">{{ $p->title }}</h4>
        <a class="btn btn-info card-link home-card-btn" href="{{ route('showPost', $p->title) }}">Read More &rarr;</a>
        <br>
    </div>
@endforeach
