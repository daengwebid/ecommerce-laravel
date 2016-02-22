@extends('layouts.master')

@section('title')
	<title>Testimoni | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Testimoni Customer<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Testimoni</a></li>
            <li class="active">Data Testimoni</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
            	    <div class="pull-right"> 
				    	
				    </div>

                </div><!-- /.box-header -->
                
               
                <div class="table-responsive">

					<table class="table table-striped table-bordered display" id="produk">
				    	<thead>
				    		<tr>
					    		<th>Nama</th>
					    		<th>Email</th>
					    		<th>No HP</th>
					    		<th>Pesan</th>
					    		<th>Status</th>
					    		<th></th>
				    		</tr>
				    	</thead>
				    	<tbody>

				    	@foreach ($testimoni as $item)
				    		<tr>
					    		<td><a href="{{ url('/dw-admin/testimoni/' . $item->id . '/edit') }}"><strong>{{ $item->nama }}</strong></td>
					    		<td>{{ $item->email }}</td>
					    		<td>{{ $item->no_hp }}</td>
					    		<td>{{ str_limit($item->pesan, 30) }}</td>
					    		<td>
					    			@if ($item->status == 0)
					    				<span class="label label-warning">Pending</span>
					    			@else
					    				<span class="label label-success">Active</span>
					    			@endif
					    		</td>
					    		<td>
					    		{{ Form::open(array('url'=>'/dw-admin/testimoni/' . $item->id, 'method'=>'DELETE')) }}
					    		<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
      $("#produk").DataTable({
     		"order": [[3, "desc"]]
  		});
    });
</script>
@endsection