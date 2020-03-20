@extends('admin.master')
@section('css')
    <link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_settings')
active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 pull-right">
            <a href="{{ route('user.create') }}">
                <button type="button" class="btn bg-blue waves-effect pull-right"><span><i class="material-icons">add</i> Add User</span></button>
            </a>
        </div>
        <br>
        <br>
        <br>
        @if (session('insertion'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                User registered successfuly.
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                User deleted successfuly.
            </div>
        @endif
        @if(session('edtSuccess'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                User edited successfuly.
            </div>
        @endif
        @if(session('dltSuccess'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                User deleted successfuly.
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
                                <th>Name</th>
                                <th>Registered At</th>
                                <th>Total Posts</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl. No</th>
                                <th>Name</th>
                                <th>Registered At</th>
                                <th>Total Posts</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $val)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $val->name }} @if(strcmp($val->name, Auth::user()->name) == 0) (You) @endif</td>
                                    <td>{{ $val->created_at->diffForHumans() }}</td>
                                    <td>{{ $val->num_of_posts }}</td>
                                    <td>
                                        <a href="{{route('user.show', $val->id)}}">
                                        <button class="btn btn-info waves-effect"><i class="material-icons">remove_red_eye</i></button>
                                        </a>
                                        <a href="{{ route('user.edit', $val->id) }}">
                                        <button class="btn btn-warning waves-effect"><i class="material-icons">edit</i></button>
                                        </a>
                                        <button class="btn btn-danger waves-effect" onclick=" if(confirm('Are you sure you want to delete the user named {{stripslashes($val->name)}} ')) { event.preventDefault(); document.getElementById('delForm{{$val->id}}').submit() } else { event.preventDefault() }"><i class="material-icons">delete</i></button>
                                        <form id="delForm{{$val->id}}" action="{{ route('user.destroy', $val->id) }}" method="POST">
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



