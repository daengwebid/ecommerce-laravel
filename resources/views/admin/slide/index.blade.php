@extends('layouts.master')

@section('title')
<title>Slide | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Data Slide (Banner)<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Slide</a></li>
            <li class="active">Data Slide</li>
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

                	{!! Form::open(array('url'=>'/dw-admin/slide', 'class'=>'form-horizontal', 'files' => true)) !!}
	                	<div class="form-group">
	                      {!! Form::label('title', 'Title', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title', 'required'=>'required']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::textarea('deskripsi', null, ['class'=>'form-control', 'id'=>'deskripsi', 'cols'=>'30', 'rows'=>'5']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('url', 'URL', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::url('url', null, ['class'=>'form-control', 'id'=>'url']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('banner_slide', 'Banner', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::file('banner_slide', null, ['id'=>'banner_slide']) !!}
	                      </div>
	                    </div>
	                    
	                    <div class="form-group">
	                    	<label></label>
		                  	<div class="col-sm-12">
		                    	{!! Form::submit('Add New Slide', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
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
					    		<th>Banner</th>
					    		<th>Title</th>
					    		<th>Deskripsi</th>
					    		<th>Action</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	
				    	@foreach ($slide as $item)
				    		<tr>
					    		<td>
					    			@if ($item->banner_slide != "")
					    				<img src="{{ asset('/upload/banner/' . $item->banner_slide) }}" class="img-responsive img-thumbnail" width="70">
					    			@endif
					    		</td>
					    		<td>{{ $item->title }}</td>
					    		<td>{{ $item->deskripsi }}</td>
					    		<td>
					    			{{ Form::open(array('method'=>'DELETE', 'route'=>array('slide.destroy', $item->id))) }}
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