@extends('admin.master')
@section('css')
<link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_post')
active
@endsection
@section('content')
<div class="row">

    <br/>
    <div class="col-md-12">

        <form action="{{ route('post.update', $val->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit your post:
                        </h2>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="title">Edit Post Title:</label>
                                        <input type="text" class="form-control" placeholder="Edit Post Title Here..." name="title" id="title" value="{{ $val->title}}">
                                    </div>
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                                <br>
                                {{--  <input type="hidden" value="{{ Auth::user()->id }}" name="posted_by">  --}}
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="subtitle">Edit Post Subtitle:</label>
                                        <input type="text" class="form-control" placeholder="Edit Post Subtitle Here..." name="subtitle" id="subtitle" value="{{ $val->subtitle}}">
                                    </div>
                                    <p class="text-danger">{{$errors->first('subtitle')}}</p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="category">Select Post Archive:</label>
                                    <br>
                                    <select name="categories" id="categories" class="mdb-select md-form" >
                                        @foreach($cat as $cat)
                                        <option @if($cat->id == $val->id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{$errors->first('categories')}}</p>
                                </div>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" value="0" name="status">
                                    <input type="checkbox" id="published" value="1" name="status">
                                    <label for="published">Published</label>
                                    <p class="text-danger">{{$errors->first('status')}}</p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <p><strong>Previously uploaded featured image:</strong></p>
                                    <img class="img img-fluid img-thumbnail" src="{{ asset('user/images/uploads/post/' . $val->image) }}" alt="Failed to load image" style="max-height: 100px; max-width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image">Featured Image:</label>
                                    <input type="file" id="image" name="image">
                                    <p class="text-danger">{{$errors->first('image')}}</p>
                                </div>
                                <br>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2>Compose post body here:</h2>
                </div>
                <div class="body">
                    <p class="text-danger">{{$errors->first('body')}}</p>
                    <textarea name="body" id="post-body">
                        {{ $val->body }}
                    </textarea>
                </div>
            </div>

            <div class="card">
                <div class="footer">
                    <div class="container-fluid">
                        <br>
                        <a href="{{ route('post.index') }}" class="pull-left btn btn-info waves-effect">Go Back</a>
                        <button type="submit" class="pull-right btn btn-success waves-effect">Update &rarr;</button>
                    </div>
                    <br>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function($) {
		CKEDITOR.replace( 'post-body' );
    });
    $(document).ready(function($) {
		$('.select').select();
	});
</script>
@endsection
