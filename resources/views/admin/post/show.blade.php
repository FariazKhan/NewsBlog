@extends('admin.master')
@section('css')
    <link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_post')
active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 pull-right">
            <a href="{{ route('post.create') }}">
                <button type="button" class="btn bg-blue waves-effect pull-right"><span><i class="material-icons">add</i> Add Post</span></button>
            </a>
        </div>
        <br>
        <br>
        <br>
        @if (session('insertion'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Posted successfuly.
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Post deleted successfuly.
            </div>
        @endif
        @if(session('edtSuccess'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Post edited successfuly.
            </div>
        @endif
        @if(session('dltSuccess'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Post deleted successfuly.
            </div>
        @endif
        @if(session('img_not_supp'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Oh snap!</h4>
                This kind of file extension of the featured image is not supported!
            </div>
        @endif
        <br/>
        <br/>
        <br/>
        <div class="col-md-12">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Title</th>
                                <th>Posted By</th>
                                <th>Posted On</th>
                                <th>Archive</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl. No</th>
                                <th>Title</th>
                                <th>Posted By</th>
                                <th>Posted On</th>
                                <th>Archiven</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($val as $val)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $val->posted_by }}</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>{{ App\admin\Categories::where('id', '=', $val->categories_id)->get()->first()['name'] }}</td>
                                    <td>@if( $val->status  == 1) <span class="badge bg-green">Published </span> @else <span class="badge bg-pink">Drafted </span> @endif</td>
                                    <td>
                                        <a href="{{route('showPost', $val->title)}}">
                                        <button class="btn btn-info waves-effect"><i class="material-icons">remove_red_eye</i></button>
                                        </a>
                                        <a href="{{route('post.edit', $val->id)}}">
                                        <button class="btn btn-warning waves-effect"><i class="material-icons">edit</i></button>
                                        </a>
                                        <button class="btn btn-danger waves-effect" onclick=" if(confirm('Are you sure you want to delete post containing title {{stripslashes($val->title)}} ')) { event.preventDefault(); document.getElementById('delForm{{$val->id}}').submit() } else { event.preventDefault() }"><i class="material-icons">delete</i></button>
                                        <form id="delForm{{$val->id}}" action="{{ route('post.destroy', $val->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
