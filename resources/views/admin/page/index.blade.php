@extends('layouts.master')

@section('title')
	<title>Pages | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Data Page<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Data Page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
            	    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                
                <div class="table-responsive">
                	<a href="{{ url('/dw-admin/pages/create') }}"><button class="btn btn-primary btn-sm pull-right">Add New</button></a>
					<table class="table table-striped table-bordered display" id="kategori">
				    	<thead>
				    		<tr>
					    		<th>Title</th>
					    		<th>Slug</th>
					    		<th>Content</th>
					    		<th>Action</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	@foreach ($page as $item)
				    		<tr>
				    			<td><a href="{{ url('/dw-admin/pages/' . $item->id . '/edit') }}"><strong>{{ $item->judul }}</strong></a></td>
				    			<td>{{ $item->slug }}</td>
				    			<td>{!! str_limit($item->content, 30) !!}</td>
				    			<td>
				    				{!! Form::open(array('url' => '/dw-admin/pages/' . $item->id, 'method' => 'DELETE')) !!}
				    					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
				    					
				    				{!! Form::close() !!}
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