@extends('admin.master')
@section('widgets')
    active
@endsection
@section('content')
<div class="row">
    <div class="card">
        <div class="header">
            <h4>Edit the top scrollbar:</h4>
            <hr>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <h5>This is how the scrollbar look like:</h5>
                    <marquee direction="right" bgcolor="{{ $color }}">
                        @foreach ($contents as $c)
                        <a href="{{ $c->link }}" style="display: inline-block">
                            <span id="topscrollbartxt" style=" color :{{ $txtcolor }}; ">{{ $c->title }} • </span>
                        </a>    
                        @endforeach
                    </marquee>
                </div>
                
                
                <form id="color-picker-form">
                    @csrf
                    <div class="col-md-6">
                        <label for="color-picker">Pick a color for the Top Scrollbar section:</label>
                        <div class="input-group colorpicker colorpicker-element" style="z-index: 1;">
                            <div class="form-line">
                                <input id="color-picker" type="text" name="color" class="form-control" placeholder="Click & Pick A Color!" value="{{ $color }}">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                        <button type="button" id="colorSubmitBtn" class="btn btn-primary waves-effect">Update color</button>
                    </div>
                </form>
                
                
            </div>
            
            <div class="row">
                <form id="text-color-picker-form">
                    @csrf
                    <div class="col-md-6">
                        <label for="text-color-picker">Pick a color for the Top Scrollbar section text:</label>
                        <div class="input-group colorpicker colorpicker-element" style="z-index: 1;">
                            <div class="form-line">
                                <input id="text-color-picker" type="text" name="text_color" class="form-control" placeholder="Click & Pick A Color!" value="{{ $txtcolor }}">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                        <button type="button" id="textColorSubmitBtn" class="btn btn-primary waves-effect">Update color</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
    
    <div class="card">
        <div class="header">
            <h5>Set the content of the scrollbar:</h5>
        </div>
        <div class="body">
            <div class="pull-right">
                <button id="addbtn" class="btn btn-flat btn-info waves-effect" onclick="showAddModal()"><i class="material-icons">add</i> Add content</button>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl. No</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Link</th>
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
    <div class="footer"></div>
</div>
</div>


{{-- Modals --}}
<div class="modal fade modal-fluid modal-top" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit the content</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="edtModalForm" methd="POST">
                @csrf
                <div class="form-group">
                    <div class="form-line">
                        <label for="title">Edit the title of the content:</label>
                        <input type="hidden" name="dataid" id="dataid">
                        <input type="text" class="form-control" placeholder="Enter the title of the content..." name="datatitle" id="datatitle">
                    </div>
                    <p class="text-danger">{{$errors->first('datatitle')}}</p>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <label for="title">Edit the link of the category:</label>
                        <input type="text" class="form-control" placeholder="Enter the link of the category..." name="datalink" id="datalink">
                    </div>
                    <p class="text-danger">{{$errors->first('datalink')}}</p>
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

<div class="modal fade modal-fluid modal-top" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add a content</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addModalForm" methd="POST">
                @csrf
                <div class="form-group">
                    <div class="form-line">
                        <label for="title">Set the title of the content:</label>
                        <input type="text" class="form-control" placeholder="Enter the title of the content..." name="title" id="title">
                    </div>
                    <p class="text-danger" id="title-error"></p>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <label for="title">Set the link of the category:</label>
                        <input type="text" class="form-control" placeholder="Enter the link of the category..." name="link" id="link">
                    </div>
                    <p class="text-danger" id="link-error"></p>
                </div>
                <p id="testP"></p>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button wave-effect" id="updatecat" class="btn btn-success" onclick="storeData()">Save changes</button>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {'X-Csrf-Token' : '{{ @csrf_token() }}'}
    });
    
    $('#colorSubmitBtn').click(function(){
        $.ajax({
            type: 'post',
            url: '{{ route("setTopScrollbarBGColor") }}',
            data: $('#color-picker-form').serialize(),
            success: function(e){
                Swal.fire({
                    title : 'Success!',
                    text  : 'Color updated successfully.',
                    icon  : 'success'
                });
            }
        });
        $('marquee').attr('bgcolor', $('#color-picker').val());
        $('#colorSubmitBtn').css({'background': $('#color-picker').val() + ' !important'});
    });
    
    $('#textColorSubmitBtn').click(function(){
        $.ajax({
            type: 'post',
            url: 'top-scrollbar-text/update',
            data: $('#text-color-picker-form').serialize(),
            success: function(e){
                Swal.fire({
                    title : 'Success!',
                    text  : 'Text Color updated successfully.',
                    icon  : 'success'
                });
            }
        });
        $('#topscrollbartxt').css('color', $('#text-color-picker').val());
    });
    
    $(document).ready(function(){
        fetchData();
    });
    
    function fetchData()
    {
        var html = "";
        $.ajax(
        {
            type: 'GET',
            url: 'top-scrollbar/data',
            success: function(data)
            {
                data.forEach(function(row, index)
                {
                    var temp = row.link.substring(0, 50);
                    html += "<tr>";
                        html += '<td>' + (index+1) + '</td>';
                        html += '<td>' + row.id + '</td>';
                        html += '<td>' + row.title + '</td>';
                        html += '<td><span style="display: none;">' + row.link + '</span>';
                        html += ' ' + temp + "[...]" + '</td>';
                        html += '<td><button class="btn btn-warning waves-effect" id="editBtn" data-id="' + row.id + '" data-toggle="modal" data-target="#editModal" onclick="showModal()"><i class="material-icons">edit</i></button>';
                        html += '<button class="m-l-5 btn btn-danger btnDelete ml-3 waves-effect" data-id="' + row.id + '"><i class="material-icons">delete</i></button>';
                    html += ' </tr>';
                        });
                        $('tbody').html(html);
                    }
                });
            }
            
    function showModal()
    {
        $('table').on('click', '#editBtn', function(){
            var id = $(this).attr('data-id');
            var title = $(this).parent().parent().find('td').eq(2).text();
            var link = $(this).parent().parent().find('span').text();
            
            $('#dataid').val(id);
            $('#datatitle').val(title);
            $('#datalink').val(link);
        });
    }

    function showAddModal()
    {
        $('#addModal').modal('toggle');
    }

    function storeData()
    {
        var data = $('#addModalForm').serialize();
        $.ajax(
        {
            type: 'POST',
            url: '{{route("storeScrollbarData")}}',
            dataType: 'JSON',
            data: data,
            success: function(e)
                {
                    Swal.fire({
                        title: e.title,
                        text: e.text,
                        icon: 'success'
                    });
                    fetchData();   
                    $('#addModal').modal('toggle');
                },
            error: function(e)
                {
                    fetchData();
                    $('#title-error').html(e.responseJSON.errors.title);
                    $('#link-error').html(e.responseJSON.errors.link);
                }
        });
        fetchData();
    }

    // Function for Deleting data
    $('table').on('click', '.btn-danger', function(e){
        var data_id = $(this).attr('data-id');
        var id = '{"id" : "' + data_id + '" }';
        var data = JSON.parse(id);
        $.ajax(
        {
            type: 'POST',
            url: '{{route("deleteScrollbarData")}}',
            dataType: 'JSON',
            data: data,
            success: function(e)
            {
                Swal.fire({
                    title: e.title,
                    text: e.text,
                    icon: e.icon
                });
                fetchData();
            },
            error: function(e)
            {
                Swal.fire({
                    title: e.title,
                    text: e.text,
                    icon: e.icon
                });
                fetchData()
            }
        });
    });

    function updateData()
    {
        var data = $('#edtModalForm').serialize();
        $.ajax(
        {
            type: 'POST',
            url: 'top-scrollbar/update',
            data: data,
            dataType: 'JSON',
            success: function(e){
                Swal.fire({
                    title: e.id,
                    text:  e.text,
                    icon:  e.icon
                });
                reset();
                fetchData();
                $('#editModal').modal('toggle');
            }
        }); 
    }

    function reset() 
    {
        $('#edtModalForm').find('input').val("");
        $('#addModalForm').find('input').val("");
    }
            
        </script>
        @endsection
        