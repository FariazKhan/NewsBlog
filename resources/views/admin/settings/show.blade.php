@extends('admin.master')
@section('css')
<link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('active_settings')
active
@endsection
@section('content')
<div class="row">
    
    <br/>
    @if (session('update-success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close pull-right" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Settings Updated Successfuly.
    </div>
    @endif
    
    @if(session('del-success'))
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
    <div class="card">
        <div class="card">
            <div class="header">
                <h2>
                    Change the settings of the web app:
                </h2>
            </div>
            <form action="{{ route('settings.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="name">Name of the blog:</label>
                                    <input type="text" class="form-control" placeholder="The name of the blog is..." name="blog_name" id="name" value="{{$data->blog_name}}">
                                </div>
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="slogan">Slogan of the blog:</label>
                                    <input type="text" class="form-control" placeholder="The slogan of the blog is..." name="blog_slogan" id="slogan" value="{{$data->blog_slogan}}">
                                </div>
                                <p class="text-danger">{{$errors->first('slogan')}}</p>
                            </div>
                            <br>
                            
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="slogan">Text for copyright section:</label>
                                    <input type="text" class="form-control" placeholder="Place the text..." name="blog_copyright" id="copyright" value="{{$data->blog_copyright}}">
                                </div>
                                <p class="text-danger">{{$errors->first('slogan')}}</p>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="slogan">The meta text (for SEO purpose):</label>
                                    <input type="text" class="form-control" placeholder="Place the text..." name="blog_meta" id="meta" value="{{$data->blog_meta}}">
                                </div>
                                <p class="text-danger">{{$errors->first('slogan')}}</p>
                            </div>
                            
                            <div class="form-group">
                                <div class="">
                                    <label for="favicon">Favicon of the blog:</label>
                                    <br/>
                                    <p>Current Favicon:</p>
                                    <img src="{{asset('admin/uploads/settings'). '/' . $data->blog_logo}}" class="img img-thumbnail" height="48px" width="48px"/>
                                    <p>Upload a new one:</p>
                                    <input type="file" id="favicon" name="blog_logo">
                                    <p class="text-danger">{{$errors->first('blog_logo')}}</p>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                
                <div class="footer">
                    <div class="container-fluid">
                        <button type="submit" class="pull-right btn btn-success waves-effect">Update <i class="material-icons">keyboard_arrow_right</i></button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    
    <div class="card">
        <div class="header">
            <h4>Archives:</h4>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-fluid modal-top" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit the archive</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edtModalForm" methd="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-line">
                                <label for="title">Edit the name of the archive:</label>
                                <input type="hidden" name="catid" id="catid">
                                <input type="text" class="form-control" placeholder="Enter the name of the archive..." name="catname" id="catname">
                            </div>
                            <p class="text-danger">{{$errors->first('catname')}}</p>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="title">Edit the slug of the archive:</label>
                                <input type="text" class="form-control" placeholder="Enter the slug of the archive..." name="catslug" id="catslug">
                            </div>
                            <p class="text-danger">{{$errors->first('catslug')}}</p>
                        </div>
                        <p id="testP"></p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button wave-effect" id="updatecat" class="btn btn-success" onclick="updateData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade modal-fluid modal-top" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add an archive</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addModalForm" methd="POST">
                    @csrf
                    {{-- Archive is named as category or cat in coding. In view, it is named as archive. --}}
                    <div class="form-group">
                        <div class="form-line">
                            <label for="title">Add the name of the archive:</label>
                            <input type="text" class="form-control" placeholder="Enter the name of the archive..." name="catname" id="addcatname">
                        </div>
                        <p class="text-danger">{{$errors->first('catname')}}</p>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <label for="title">Add the slug of the archive:</label>
                            <input type="text" class="form-control" placeholder="Enter the slug of the archive..." name="catslug" id="addcatslug">
                        </div>
                        <p class="text-danger">{{$errors->first('catslug')}}</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button wave-effect" id="addcat" class="btn btn-success" onclick="addCategory()">Save archive</button>
            </div>
        </div>
    </div>
</div>
<div class="body">
    <div style="float: right;">
        <button class="btn btn-success" onclick="showAddNewModal()"><i class="material-icons">add_circle_outline</i> Add a category</button>
    </div>
    <br/>
    <br/>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                    <th>Sl. No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Sl. No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {'X-CSRF-Token': '{{ @csrf_token() }}'}
    });
    
    fetchCategories();
    
    function showModal()
    {
        $('table').on('click', '#editBtn', function(){
            var id = $(this).attr('data-id');
            var name = $(this).parent().parent().find('td').eq(2).text();
            var slug = $(this).parent().parent().find('td').eq(3).text();
            
            $('#catid').val(id);
            $('#catname').val(name);
            $('#catslug').val(slug);
        });
    }
    
    function updateData()
    {
        var txt = $('#edtModalForm').find('input').eq(1).val();
        var data = $('#edtModalForm').serialize();
        
        // var id = $(this).parent().parent().parent().find('td').eq(1).text();
        $.ajax(
        {
            type: 'POST',
            url: 'settings/edit',
            data: data,
            dataType: 'JSON',
            success: function(e){
                Swal.fire({
                    title: e.title,
                    text:  e.body,
                    icon:  e.icon
                });
                reset();
                fetchCategories();
                $('#editModal').modal('toggle');
            }
        }); 
    }
    
    function showAddNewModal()
    {
        $('#addModal').modal('toggle');
    }
    
    function addCategory()
    {
        var data = $('#addModalForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'settings/add',
            data: data,
            dataType: 'JSON',
            success: function(e){
                $('#addModal').modal('toggle');
                Swal.fire({
                    title: e.title,
                    text: 'Category added successfully!',
                    icon: 'success'
                });
                reset();
                fetchCategories();
            }
        });
    }
    
    $('table').on('click', '.btnDelete', function(){
        if(confirm("Do you really want to delete the category named " + $(this).parent().parent().find('td').eq(2).text() + "? \nWarning! Deleting can't be undone."))
        {
            var data_id = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: 'settings/delete/' + data_id,
                data: data_id,
                success: function(e)
                {
                    Swal.fire({
                        title: "Success!",
                        text: e.message,
                        icon: 'success'
                    });
                    fetchCategories();
                }
            });
        }
    });
    
    function getInputs()
    {
        var catid = $('input[name="catid"]').val();
        var catname = $('input[name="catname"]').val();
        var catslug = $('input[name="catslug"]').val();
        return {catid: catid, catname: catname, catslug: catslug};
    }
    
    function reset() 
    {
        $('#edtModalForm').find('input').val("");
        $('#addModalForm').find('input').val("");
    }
    
    function fetchCategories()
    {
        var html = "";
        $.ajax(
        {
            type: 'GET',
            url: 'fetchCategories',
            success: function(data)
            {
                data.forEach(function(row, index)
                {
                    html += "<tr>";
                        html += '<td>' + (index+1) + '</td>';
                        html += '<td>' + row.id + '</td>';
                        html += '<td>' + row.name + '</td>';
                        html += '<td>' + row.slug + '</td>';
                        html += '<td>' + row.created_at + '</td>';
                        html += '<td><button class="btn btn-warning waves-effect" id="editBtn" data-id="' + row.id + '" data-toggle="modal" data-target="#editModal" onclick="showModal()"><i class="material-icons">edit</i></button>';
                            html += '<button class="m-l-5 btn btn-danger btnDelete ml-3 waves-effect" data-id="' + row.id + '"><i class="material-icons">delete</i></button>';
                            html += ' </tr>';
                        });
                        $('tbody').html(html);
                    }
                }
                );
        }
            
            
        </script>
        @endsection
        