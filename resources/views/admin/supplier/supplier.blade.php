@extends('layouts.master')

@section('title')
	<title>Supplier | {{ $pengaturan->nama_toko }}</title>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	
@endsection

@section('plugin')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<style type="text/css">
		.ui-autocomplete { max-height: 200px; max-width: 300px; overflow-y: scroll; overflow-x: hidden;}
	</style>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
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
            <li class="active">Data Supplier</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

      	<div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Add New Supplier</h4>
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

                	{!! Form::open(array('url'=>'/dw-admin/supplier', 'class'=>'form-horizontal')) !!}
	                	<div class="form-group">
	                      {!! Form::label('nama_supplier', 'Name Supplier', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('nama_supplier', null, ['class'=>'form-control', 'id'=>'nama_supplier', 'required'=>'required']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('id_kota', 'City', ['class'=>'control-label col-sm-offset-1']) !!}
	                      <div class="col-sm-12"> 
	                      	<select class="form-control" name="city_id" id="id_kota" style="width: 100%">
	                      		<option value=""></option>
			                    @for ($i=0; $i<count($kota['rajaongkir']['results']); $i++)
                                	<option value="{{ $kota['rajaongkir']['results'][$i]['city_id'] }}">{{ $kota['rajaongkir']['results'][$i]['city_name'] }}</option>
                            	@endfor
		                    </select>
		                    {!! Form::hidden('kota_supplier', null, ['class'=>'form-control', 'id'=>'kota_supplier', 'required'=>'required']) !!}
		                    
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('website', 'Website', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::url('website', null, ['class'=>'form-control', 'id'=>'website', 'required'=>'required']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('contact', 'Contact', ['class'=>'col-sm-offset-1 control-label']) !!}
	                      <div class="col-sm-12"> 
	                      	{!! Form::text('contact', null, ['class'=>'form-control', 'id'=>'contact', 'required'=>'required']) !!}
	                      	<p id="pesan"></p>
	                      </div>
	                    </div>
	                    
	                    <div class="form-group">
	                    	<label></label>
		                  	<div class="col-sm-12">
		                    	{!! Form::submit('Add New Supplier', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
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
					<table class="table table-striped table-bordered display" id="supplier">
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

<script type="text/javascript">
  $('#id_kota').select2({
  	placeholder: "Select a City",
  	theme: "classic",
  	allowClear: true
  });

</script>

<script type="text/javascript">
	$("#id_kota").change(function() {
		var nama_kota = $("#id_kota option:selected").text();
		$("#kota_supplier").val(nama_kota);

	})
</script>



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