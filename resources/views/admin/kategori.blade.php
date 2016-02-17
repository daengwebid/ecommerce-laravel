@extends('layouts.master')

@section('title')
<title>Categories | {{ $pengaturan->nama_toko }}</title>
<meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Category<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Catalog</a></li>
            <li class="active">Data Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

      	<div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Add New Category</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Notification</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                	<hr>

                	{!! Form::open(array('url'=>'/dw-admin/category', 'class'=>'form-horizontal')) !!}
	                	<div class="form-group">
	                      {!! Form::label('nama_kategori', 'Name', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('nama_kategori', null, ['class'=>'form-control', 'id'=>'nama_kategori', 'required'=>'required']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('slug', 'Slug', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('slug', null, ['class'=>'form-control', 'id'=>'slug', 'readonly'=>'readonly']) !!}
	                      	<p id="pesan"></p>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('deskripsi', 'Description', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::textarea('deskripsi', null, ['class'=>'form-control', 'id'=>'deskripsi', 'cols'=>'30', 'rows'=>'5']) !!}
	                      </div>
	                    </div>
	                    
	                    <div class="form-group">
	                    	<label></label>
		                  	<div class="col-sm-12">
		                    	{!! Form::submit('Add New Category', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
		                    </div>
	                  	</div>
	                {!! Form::close() !!}


                </div><!-- /.box-body -->
            </div><!-- /.box -->

            
        </div><!-- /.col -->

        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
            	    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                
                <div class="table-responsive">
					<table class="table table-striped table-bordered display" id="kategori">
				    	<thead>
				    		<tr>
					    		<th>Name</th>
					    		<th>Description</th>
					    		<th>Slug</th>
					    		<th>Action</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	
				    	@foreach ($kategori as $item)
				    		<tr>
					    		<td>{{ $item->nama_kategori }}</td>
					    		<td>{{ $item->deskripsi }}</td>
					    		<td>{{ $item->slug }}</td>
					    		<td>
					    			{{ Form::open(array('method'=>'DELETE', 'route'=>array('kategori.destroy', $item->id))) }}
					    			{{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm')) }}
					    			{{ Form::close() }}
					    		</td>
				    		</tr>
				    	@endforeach

				    	</tbody>
				    </table>
				   
				</div>

            </div><!-- /.box -->
        </div><!-- /.col -->
    	</div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $("#nama_kategori").focusout(function(){
        $.ajax({
            url: "/dw-admin/category/slug",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { nama_kategori : $("#nama_kategori").val() },
            dataType: 'json',
            success: function(data) {
                var slug = $("#slug");

                if (data.pesan == 0) {
                	$("#pesan").text("");
                	$("#simpan").prop("disabled", false);
                	slug.val(data.nama_kategori);
                } else {
                	$("#pesan").text("Already Exist!");
                	$("#pesan").css("color", "red");
                	$("#simpan").prop("disabled", true);
                }
                
            },error:function(){ 
                alert("error!!!!");
            }
        }); 
    });
</script>

<script>
    $(function() {
      $("#kategori").DataTable({
     		columnDefs: [ { 
     			"visible": false, "orderable": false
     		}]
  		});
    });
</script>
@endsection