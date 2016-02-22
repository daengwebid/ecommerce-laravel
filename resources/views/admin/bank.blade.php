@extends('layouts.master')

@section('title')
<title>Payment Method | {{ $pengaturan->nama_toko }}</title>
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
            <li><a href="#">Bank</a></li>
            <li class="active">Data Bank</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

      	<div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Metode Pembayaran</h4>
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

                	{!! Form::open(array('url'=>'/dw-admin/payment', 'class'=>'form-horizontal')) !!}
	                	<div class="form-group">
	                      {!! Form::label('nama_pemilik', 'Nama Pemilik', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('nama_pemilik', null, ['class'=>'form-control', 'id'=>'nama_pemilik', 'required'=>'required']) !!}
	                      </div>
	                    </div>

                        <div class="form-group">
                          {!! Form::label('no_rekening', 'No Rekening', ['class'=>'col-sm-offset-1 control-label']) !!}
                          <div class="col-sm-12"> 
                            {!! Form::text('no_rekening', null, ['class'=>'form-control', 'id'=>'no_rekening', 'required'=>'required']) !!}
                          </div>
                        </div>

	                    <div class="form-group">
	                      {!! Form::label('nama_bank', 'Nama Bank', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	<select name="nama_bank" class="form-control" id="nama_bank" required="">
                                <option value="">Silahkan Pilih</option> 
                                <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>   
                            </select>
	                      </div>
	                    </div>

                        <div class="form-group">
                          {!! Form::label('kode_bank', 'Kode Bank', ['class'=>'col-sm-offset-1 control-label']) !!}
                          <div class="col-sm-12"> 
                            {!! Form::text('kode_bank', null, ['class'=>'form-control', 'id'=>'kode_bank', 'required'=>'required']) !!}
                          </div>
                        </div>
	                    
	                    <div class="form-group">
	                    	<label></label>
		                  	<div class="col-sm-12">
		                    	{!! Form::submit('Tambah Data', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
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
					<table class="table table-striped table-bordered display" id="bank">
				    	<thead>
				    		<tr>
					    		<th>Nama Pemilik</th>
					    		<th>No Rekening</th>
					    		<th>Nama Bank</th>
                                <th>Kode Bank</th>
					    		<th>Action</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    	@foreach ($bank as $item)
				    		<tr>
					    		<td>{{ $item->nama_pemilik }}</td>
					    		<td>{{ $item->no_rekening }}</td>
					    		<td>{{ $item->nama_bank }}</td>
                                <td>{{ $item->kode_bank }}</td>
					    		<td>
					    			{{ Form::open(array('method'=>'DELETE', 'route'=>array('payment.destroy', $item->id))) }}
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
      $("#bank").DataTable({
     		columnDefs: [ { 
     			"visible": false, "orderable": false
     		}]
  		});
    });
</script>
@endsection