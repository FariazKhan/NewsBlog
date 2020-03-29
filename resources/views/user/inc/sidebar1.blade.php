<div class="col-md-3 container pl-5">
    <div class="row">
        @foreach($sidebar as $p)
        <div class="col-md-12 sidebar-card">
            <div class="row">
                <div class="img-container bg-dark col-md-5 col-sm-6 col-6 float-left" style="width: 50%;">
                    <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="img rounded" alt="">
                </div>
                <div class="thumbnail-text col-md-6 col-sm-6 col-5">
                    <a href="{{ route('showPost', $p->title) }}">
                        <p class="t-d-none column-no-left-padding font-ekushe">{{ $p->title }}</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>