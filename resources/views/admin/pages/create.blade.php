@extends('admin.master')
@section('css')
<link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_page')
active
@endsection
@section('content')
<div class="row">

    <br/>
    <div class="col-md-12">

        <form action="{{ route('pages.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card">
                    <div class="header">
                        <h2>
                            Compose your page:
                        </h2>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="title">Enter Page Title:</label>
                                        <input type="text" class="form-control" placeholder="Enter Page Title Here..." name="title" id="title">
                                    </div>
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    * The link of the page will be generated according to your title. If you want a custom title, type it here, or leave the field empty if you don't want a custom title.
                                    <div class="form-line">
                                        <label for="slug">Enter Custom Slug:</label>
                                        <input type="text" class="form-control" placeholder="Enter Page slug Here..." name="slug" id="slug">
                                    </div>
                                    <p class="text-danger">{{$errors->first('slug')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2>Compose page body here:</h2>
                </div>
                <div class="body">
                    <p class="text-danger">{{$errors->first('body')}}</p>
                    <textarea name="body" id="post-body"></textarea>
                </div>
            </div>

            <div class="card">
                <div class="footer">
                    <div class="container-fluid">
                        <br>
                        <a href="{{ route('pages.index') }}" class="pull-left btn btn-info waves-effect">Go Back</a>
                        <button type="submit" class="pull-right btn btn-success waves-effect">Publish >></button>
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
