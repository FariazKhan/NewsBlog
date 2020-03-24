<div class="navbar main-nav col-md-12 justify-content-center d-none d-md-flex sticky-top">
    <div class="row">
        <a class="list-img navbar-brand" href="{{ route('homepage') }}"><img src="{{ ('user/images/wirebd_logo.png') }}" alt=""></a>
        <ul class="main-nav-ul">
            <li><a href="{{ route('homepage') }}">হোম</a></li>
            <li class="dropdown c-pointer" aria-haspopup="true" aria-expanded="false"><a>আর্কাইভসমূহ</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($archives as $a)
                        <a href="{{ url('archives/' . $a->slug) }}" class="dropdown-item">{{ $a->name }}</a>
                    @endforeach
                    <a href="{{ route('showAllArchive') }}" class="dropdown-item">সব আর্কাইভ</a>                    
                </div>
            </li>
            @foreach ($pages as $page)
                <li><a href="{{ route('pages.show', $page->id) }}"> {{ $page->title }} </a></li>
            @endforeach
        </ul>
        <div class="social-links d-none d-md-block">
            <ul class="social-list ml-0">
                <li class="social-list-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="social-list-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="social-list-item"><a href="#"><i class="fab fa-blogger"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<br>
<br>
<nav class="navbar navbar-expand-md navbar-light bg-light col-md-12 sticky-top d-md-none">
    <a class="list-img navbar-brand" href="{{ route('homepage') }}"><img src="{{ ('user/images/wirebd_logo.png') }}" alt=""></a>
    <li class="list-img"><a href="#"><img src="images/wirebd_logo.png" alt=""></a></li>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            {{-- <a href="#" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a> --}}

            <li class="nav-item nav-link"><a href="{{ route('homepage') }}">হোম</a></li>
            <li class="dropdown c-pointer nav-item nav-link" aria-haspopup="true" aria-expanded="false"><a>আর্কাইভসমূহ</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($archives as $a)
                        <a href="{{ url('archives/' . $a->slug) }}" class="dropdown-item">{{ $a->name }}</a>
                    @endforeach
                    <a href="{{ route('showAllArchive') }}" class="dropdown-item">সব আর্কাইভ</a>                    
                </div>
            </li>
            @foreach ($pages as $page)
                <li class="nav-item nav-link"><a href="{{ route('pages.show', $page->id) }}"> {{ $page->title }} </a></li>
            @endforeach

        </div>
        <form class="form-inline ml-auto d-flex">
            <input type="text" class="form-control w-75"  placeholder="Search">
            <button type="submit" class="btn btn-outline-dark ml-1">Search</button>
        </form>
    </div>
</nav>