<div class="col-md-3 container pl-5">
    <div class="row">
        @foreach($sidebar as $p)
        <div class="col-md-12 sidebar-card">
            <div class="row">
                <img src="{{asset('user/images/uploads/post/' . $p->image)}}" class="w-50 img rounded" alt="">
                <div class="thumbnail-text w-50">
                    <p class="column-no-left-padding font-muktiregular">{{ $p->title }}</p>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>