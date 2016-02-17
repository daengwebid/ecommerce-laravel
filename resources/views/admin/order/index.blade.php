@extends('layouts.master')

@section('title')
	<title>Order | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Data Order<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Data Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
            	    
                </div><!-- /.box-header -->
                
               
                <div class="table-responsive">

					<table class="table table-striped table-bordered display" id="produk">
				    	<thead>
				    		<tr>
					    		<th>Invoice</th>
					    		<th>Customer</th>
					    		<th>Shipping City</th>
					    		<th>Date Time</th>
					    		<th>Payment</th>
					    		<th>Status Order</th>
					    		<th></th>
				    		</tr>
				    	</thead>
				    	<tbody>

				    	@foreach ($order as $item)
				    		<tr>
					    		<td><a href="{{ url('/dw-admin/order/' . $item->invoice) }}"><button class="btn btn-default btn-sm"><b>{{ $item->invoice }}</b></button></a></td>
					    		<td>{{ $item->customer->nama_lengkap }}</td>
					    		<td>{{ $item->city }}</td>
					    		<td>{{ $item->created_at }}</td>
					    		<td>
					    			@if ($item->paid_id == null)
					    			<span class="label label-warning">Waiting</span>
					    			@else
					    			<span class="label label-success">Verified</span>
					    			@endif
					    		</td>
					    		<td>
					    			@if ($item->status_order == 'Complete') 
		            					<span class="label label-success">{{ $item->status_order }}</span> 
		            				@elseif ($item->status_order == 'Proses Pengiriman') 
		            					<span class="label label-primary">{{ $item->status_order }}</span>
		            				@elseif ($item->status_order == 'Pending')
		            					<span class="label label-warning">{{ $item->status_order }}</span>
		            				@elseif ($item->status_order == 'Batal')
		            					<span class="label label-default">{{ $item->status_order }}</span>
		            				@endif
					    		</td>
					    		<td>
					    			<a href="{{ url('/dw-admin/order/' . $item->invoice) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-folder"></i></button></a>
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