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
        <div class="col-md-12 text-center">
            
            <h1>{{ $data->title }}</h1>
            <small>{{ $data->subtitle }}</small>
            <img src="{{ asset('user/images/uploads/post') }}/{{ $data->image }}" alt="">

            <p>
                {!! $data->body !!}
            </p>

        </div>
    </div>

@endsection


{{-- @section('script')
    <script>
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN' : '{{ @csrf_token() }}'} });

        function fetchData()
        {
            $.$.ajax({
                url: '/',
                type: 'GET',
                success: function(data)
                {
                    var raw = '';
                    data.forEach(function(row)
                    {
                        raw += '<tr>';
                        raw += '<td>'+ row.id +'</td>';
                        raw += '<td>'+ row.title +'</td>';
                        raw += "{{ getName(array_column(json_decode($val), 'posted_by')) }}";
                        raw += '<td>'+ row.created_at +'</td>';
                        raw += '<td>'+ row.likes +'</td>';
                        raw += '<td>'+ row.dislikes +'</td>';
                        raw += '</tr>';
                    });
                    $('table tbody').html(raw);
                }
                });
        }
        jQuery(document).ready(function($)
        {
            fetchData();    
        });
        
    </script>
@endsection --}}


