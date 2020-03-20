<div class="navbar main-nav col-md-12 justify-content-center d-none d-md-flex sticky-top">
    <div class="row">
        <ul class="main-nav-ul">
            <li class="list-img"><a href="#"><img src="images/wirebd_logo.png" alt=""></a></li>
            <li><a href="{{ route('homepage') }}">হোম</a></li>
            <li class="dropdown c-pointer" aria-haspopup="true" aria-expanded="false"><a>আর্কাইভসমূহ</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($archives as $a)
                        <a href="{{ url('archives/' . $a->slug) }}" class="dropdown-item">{{ $a->name }}</a>
                    @endforeach
                    
                </div>
            </li>
            <li><a href="#"> অনুদান </a></li>
            <li><a href="#"> যোগাযোগ </a></li>
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
    <li class="list-img"><a href="#"><img src="images/wirebd_logo.png" alt=""></a></li>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
        </div>
        <form class="form-inline ml-auto d-flex">
            <input type="text" class="form-control w-75"  placeholder="Search">
            <button type="submit" class="btn btn-outline-dark ml-1">Search</button>
        </form>
    </div>
</nav>