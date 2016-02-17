@extends('layouts.master')

@section('title')
	<title>Detail Supplier | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Data Supplier<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Supplier</a></li>
            <li class="active">Detail Supplier</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

      	<div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Detail Supplier Selected</h4>
                	<hr>

                	<!-- Detail -->
		              <div class="box box-primary">
		                <div class="box-body box-profile">
		                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/logo-folded.png') }}" alt="Logo Supplier">
		                  <h3 class="profile-username text-center">{{ $detail->nama_supplier }}</h3>
		                  <p class="text-muted text-center">{{ $detail->kota_supplier }}</p>

		                  <ul class="list-group list-group-unbordered">
		                    <li class="list-group-item">
		                      <b>Website</b> <a href="{{ $detail->website }}" class="pull-right">{{ $detail->website }}</a>
		                    </li>
		                    <li class="list-group-item">
		                      <b>Contact</b> <a class="pull-right">{{ $detail->contact }}</a>
		                    </li>
		                    
		                  </ul>

		                  <a href="{{ url('/dw-admin/supplier') }}" class="btn btn-primary btn-block"><b>Back</b></a>
		                </div><!-- /.box-body -->
		              </div><!-- /.box -->
		            <!-- End Detail -->


                </div><!-- /.box-body -->
            </div><!-- /.box -->

            
        </div><!-- /.col -->

        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
            	    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                
                <div class="table-responsive">
					<table class="table table-condensed" id="supplier">
				    	<thead>
				    		<tr>
					    		<th rowspan="2">Name Supplier</th>
					    		<th rowspan="2">City</th>
					    		<th rowspan="2">Contact</th>
					    		<th colspan="2">Action</th>
				    		</tr>
				    		<tr>
						        <th></th>
						        <th></th>         
					       </tr>
				    	</thead>
				    	<tbody>
				    	
				    	@foreach ($supplier as $item)
				    		<tr>
					    		<td>{{ $item->nama_supplier }}</td>
					    		<td>{{ $item->kota_supplier }}</td>
					    		<td>{{ $item->contact }}</td>
					    		<td>

				    				{{ Form::open(array('method'=>'DELETE', 'route'=>array('dw-admin.supplier.destroy', $item->id))) }}
					    			<button type="submit"><i class="fa fa-trash"></i></button>
					    			{{ Form::close() }}
					    		</td>
					    		<td>
				    				<a href="{{ url('/dw-admin/supplier/'. $item->id) }}" title="Show Detail"><button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-folder-open"></i></button></a>
					    			<a href="{{ url('/dw-admin/supplier/'. $item->id . '/edit') }}" title="Edit"><button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
					    			
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
      $("#supplier").DataTable({
     		columnDefs: [ { 
     			"visible": false, "orderable": false
     		}]
  		});
    });
</script>
@endsection