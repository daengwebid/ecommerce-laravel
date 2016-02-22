@extends('layouts.master')

@section('title')
	<title>Testimoni | {{ $pengaturan->nama_toko }}</title>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('plugin')
	<style type="text/css">
	.ui-autocomplete { max-height: 200px; max-width: 300px; overflow-y: scroll; overflow-x: hidden;}
	#errpersen {
		color: red;
	}
	.errkode { color: red; }
	</style>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Product<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Testimoni</a></li>
            <li class="active">Accept</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

        {!! Form::model($testimoni, array('url'=>'/dw-admin/testimoni/' . $testimoni->id, 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
      	<div class="col-md-12">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Accept Testimoni</h4>
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
                	
	                <div class="form-group">
                        {!! Form::label('nama', 'Nama *', ['class'=>'control-label col-sm-3']) !!}
                        <div class="col-sm-9"> 
                            {!! Form::text('nama', null, ['class'=>'form-control', 'id'=>'nama', 'maxlength' => '20', 'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email *', ['class'=>'control-label col-sm-3']) !!}
                        <div class="col-sm-9"> 
                        	{!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email', 'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no_hp', 'No Hp *', ['class'=>'control-label col-sm-3']) !!}
                        <div class="col-sm-9"> 
                            {!! Form::text('no_hp', null, ['class'=>'form-control', 'id'=>'no_hp', 'maxlength' => '12', 'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('pesan', 'Testimoni *', ['class'=>'control-label col-sm-3']) !!}
                        <div class="col-sm-9"> 
                            {!! Form::textarea('pesan', null, ['class'=>'form-control', 'id'=>'pesan', 'maxlength' => '160', 'readonly'=>'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status *', ['class'=>'control-label col-sm-3']) !!}
                        <div class="col-sm-9"> 
                            <select name="status" class="form-control" id="status">
                            	<option value="0" {{ $testimoni->status == 0 ? "selected":"" }}>Pending</option>
                            	<option value="1" {{ $testimoni->status == 1 ? "selected":"" }}>Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-9">
                            {!! Form::submit('Kirim', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
                        </div>
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        {!! Form::close() !!}

    	</div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection