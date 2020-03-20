@extends('user.master')

@section('content')

<div class="col-md-5 row">
    <h3 class="font-quicksand">Posts under '{{ $archive->name }}' archive:</h3>
    <hr>
    <br>
    <br>

    @foreach ($dat as $data)
        <div class="card col-md-5 offset-md-1 mb-5">
            <img class="rounded" src="{{ asset('user/images/uploads/post/' . $data->image) }}" alt="Failed to load image!" style="max-height: 100px; flex: 0% ">
            <div class="card-body">
                <h5 class="card-title">{{ $data->title }}</h5>
                <p class="card-text">{{ Str::limit($data->subtitle, $limit = 50, $end = '[...]') }}</p>
                <a href="{{ route('showPost', $data->title)}}" class="btn btn-primary">Read more &rarr;</a>
            </div>
        </div>
        <br>
        <br>
    @endforeach
    <br>
    <br>
    <div class="align-content-center mt-5 mx-auto">
        {!! $dat->links() !!}
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
