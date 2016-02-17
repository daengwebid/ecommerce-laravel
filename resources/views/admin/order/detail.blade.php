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
        <h1>Order Detail<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Detail Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
	        <div class="col-md-12">
	        	<div class="box">
	            <table class="table table-responsive table-bordered">
		            <thead>
		            	<tr>
		            		<td><h3><i class="glyphicon glyphicon-list-alt"></i> Invoice ID : #{{ $order->invoice }}</h3></td>
		            		<td>
		            			<h3>Status : 
		            				@if ($order->status_order == 'Complete') 
		            					<span class="label label-success">{{ $order->status_order }}</span> 
		            				@elseif ($order->status_order == 'Proses Pengiriman') 
		            					<span class="label label-primary">{{ $order->status_order }}</span>
		            				@elseif ($order->status_order == 'Pending')
		            					<span class="label label-warning">{{ $order->status_order }}</span>
		            				@elseif ($order->status_order == 'Batal')
		            					<span class="label label-default">{{ $order->status_order }}</span>
		            				@endif
		            			</h3>
		            		</td>
		            	</tr>
		            </thead>
		            <tbody>
		            	<tr>
		            		<td></td>
		            		<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#status_order"><i class="fa fa-refresh"></i> Update Status Order</button></td>
		            	</tr>
		            	<tr>
		            		<td>Customer : <a href="{{ url('#') }}">{{ $order->customer->email }}</a></td>
		            		<td>Time Order : {{ date('d-m-Y-H:i:s', strtotime($order->created_at)) }}</td>
		            	</tr>
		            </tbody>
	            </table>
	            </div>
	        </div><!-- /.col -->

	        <div class="col-md-12">
	        	<div class="panel panel-default">
				  	<div class="panel-heading panel-heading-sm">
                     	<h5 class="panel-title"><i class="fa fa-refresh"></i> Detail Order</h5>
                	</div>
				</div>
	        </div>

	        <div class="col-md-6">
	        	<div class="panel panel-default">
	        		<div class="panel-heading">
	        			<h5 class="panel-title"><i class="fa fa-bookmark-o"></i> Alamat Pengiriman</h5>
	        		</div>
	        		<div class="panel-body">
	        			<table class="table table-responsive table-bordered">
	        				<thead>
	        					<tr>
	        						<td>Nama </td>
	        						<td>: {{ $order->customer->nama_lengkap }}</td>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<tr>
	        						<td>Alamat</td>
	        						<td>: {{ $order->alamat }}</td>
	        					</tr>
	        					<tr>
	        						<td>Provinsi</td>
	        						<td>: {{ $order->province }}</td>
	        					</tr>
	        					<tr>
	        						<td>Kota</td>
	        						<td>: {{ $order->city }}</td>
	        					</tr>
	        					<tr>
	        						<td>Kode Pos</td>
	        						<td>: {{ $order->kode_pos }}</td>
	        					</tr>
	        					<tr>
	        						<td>No HP</td>
	        						<td>: {{ $order->customer->no_hp }}</td>
	        					</tr>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
	        <div class="col-md-6">
	        	<div class="panel panel-default">
	        		<div class="panel-heading">
	        			<h5 class="panel-title"><i class="fa fa-plane"></i> Jasa Pengiriman</h5>
	        		</div>
	        		<div class="panel-body">
	        			<table class="table table-responsive table-bordered">
	        				<thead>
	        					<tr>
	        						<td>Paket </td>
	        						<td>: JNE</td>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<tr>
	        						<td>Service</td>
	        						<td>: -</td>
	        					</tr>
	        					<tr>
	        						<td>Deskripsi</td>
	        						<td>: -</td>
	        					</tr>
	        					<tr>
	        						<td>Estimasi</td>
	        						<td>: -</td>
	        					</tr>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>

	        <div class="col-md-12">
	        	<div class="panel panel-default">
	        		<div class="panel-heading">
	        			<h5 class="panel-title"><i class="fa fa-cubes"></i> Order Items</h5>
	        		</div>
	        		<div class="panel-body">
	        			<table class="table table-responsive table-bordered">
	        				<thead>
	        					<tr>
	        						<th>Item </th>
	        						<th>Qty</th>
	        						<th>Harga</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        				@foreach ($order->order_detail as $item)
	        					<tr>
	        						<td>
	        							<p>Nama : <strong>{{ $item->nama_produk }}</strong></p>
	        							<p>Kode : {{ $item->kode_produk }}</p>
	        						</td>
	        						<td>{{ $item->qty }}</td>
	        						<td>{{ $item->harga }}</td>
	        					</tr>
	        				@endforeach
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
    	</div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal update status -->
<div id="status_order" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Ubah Status Order</h4>
      	</div>
      	<div class="modal-body">
        	{!! Form::open(array('url' => '/dw-admin/status-order', 'class' => 'form-horizontal')) !!}
        		<label>Status Order</label>
        		<select class="form-control" name="status_order" required="">
        			<option value="">Pilih</option>
        			<option value="Complete">Complete</option>
        			<option value="Proses Pengiriman">Proses Pengiriman</option>
        			<option value="Pending">Pending</option>
        			<option value="Batal">Batal</option>
        		</select>
        		<label>Catatan</label>
        		{!! Form::textarea('catatan_status', null, ['class' => 'form-control', 'placeholder' => 'Catatan Order', 'cols' => '50', 'rows' => '5']) !!}
        		{!! Form::hidden('invoice', $order->invoice, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        	
      	</div>
      	<div class="modal-footer">
      		{!! Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) !!}
        	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      		{!! Form::close() !!}
      	</div>
    </div>

  	</div>
</div>
<!-- end modal -->

<script>
    $(function() {
      $("#produk").DataTable({
     		"order": [[3, "desc"]]
  		});
    });
</script>
@endsection