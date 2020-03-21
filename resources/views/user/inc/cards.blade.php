@foreach ($posts as $p)
    <div class="col-md-2 post-card">
        <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="img" alt="Failed to load image"> 
        <br>
        <br>
        <p class="text-center font-ekushe">In {{ $p->category['name'] }} archive</p>
        <h3 class="font-teesta">{{ $p->title }}</h3>
        <a class="card-link m-0 bg-info" href="{{ route('showPost', $p->title) }}">Read More &rarr;</a>
        <br>
    </div>
@endforeach
