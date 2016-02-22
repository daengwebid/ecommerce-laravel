@extends('layouts.master')

@section('title')
	<title>Pages | {{ $pengaturan->nama_toko }}</title>
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
        <h1>Data Pages<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Edit Page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

        {!! Form::model($page ,array('url'=>'/dw-admin/pages/' . $page->id, 'class'=>'form-horizontal', 'method' => 'PUT')) !!}
      	<div class="col-md-12">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                	<h4>Add New Page</h4>
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
	                      {!! Form::label('judul', 'Title *', ['class'=>'control-label col-sm-3']) !!}
	                      <div class="col-sm-9"> 
	                      	{!! Form::text('judul', null, ['class'=>'form-control', 'id'=>'judul', 'required'=>'required']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('slug', 'Slug *', ['class'=>'control-label col-sm-3']) !!}
	                      <div class="col-sm-9"> 
	                      	{!! Form::text('slug', null, ['class'=>'form-control', 'id'=>'slug']) !!}
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      {!! Form::label('content', 'Content *', ['class'=>'control-label col-sm-3']) !!}
	                      <div class="col-sm-9"> 
	                      	<textarea name="content" class="form-control" id="content" rows="10" cols="80" >
				                {{ $page->content }}
				            </textarea>
	                      </div>
	                    </div>

	                    <div class="form-group">
		                    <label></label>
			                <div class="col-sm-9 pull-right">
			                	{!! Form::submit('Add New Page', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
			                </div>
		                </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        {!! Form::close() !!}

    	</div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    CKEDITOR.replace( 'content' );
</script>

@endsection