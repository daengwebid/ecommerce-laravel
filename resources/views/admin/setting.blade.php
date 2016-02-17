@extends('layouts.master')

@section('title')
   <title>Setting | {{ $pengaturan->nama_toko }}</title>
   <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('plugin')

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Setting
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/dw-admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Setting</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- START CUSTOM TABS -->
          <h2 class="page-header"></h2>
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs (Pulled to the right) -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                  <li><a href="#contact" data-toggle="tab">Contact</a></li>
                  <li class="pull-left header"><i class="fa fa-th"></i> </li>
                </ul>

                {!! Form::open(array('url'=>'/dw-admin/setting/update','method'=>'PUT','class'=>'form-horizontal')) !!}
                <div class="tab-content">
                  <div class="tab-pane active" id="general">
                  	
                    <div class="form-group">
                      {!! Form::label('nama_toko', 'Nama Toko', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10"> 
                      	{!! Form::text('nama_toko', $pengaturan->nama_toko, ['class'=>'form-control', 'id'=>'nama_toko', 'maxlength'=>'50']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('nama_pemilik', 'Nama Pemilik', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::text('nama_pemilik', $pengaturan->nama_pemilik, ['class'=>'form-control', 'id'=>'nama_pemilik', 'maxlength'=>'50']) !!}
                   	  </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('alamat', 'Alamat', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10"> 
                      	{!! Form::textarea('alamat', $pengaturan->alamat, ['class'=>'form-control', 'id'=>'alamat', 'cols'=>'20']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('provinsi_id', 'Pilih Provinsi', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10"> 
	                      <select id="provinsi_id" class="form-control" name="provinsi_id">
	                        @foreach ($provinsi as $provinsi)
	                            <option <?php echo ($provinsi->id == $pengaturan->provinsi_id ?'selected="selected"':'') ?> value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
	                        @endforeach
	                      </select>
	                  </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('kabupaten_id', 'Pilih Kabupaten', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10"> 
	                      <select name="kabupaten_id" class="form-control" id="kabupaten_id">
	                        <option value="{{ $pengaturan->kabupaten_id }}" id="hkabupaten">{{ $kabupaten->nama_kabupaten }}</option>
	                      </select>
	                  </div>
                    </div>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="contact">
      
                    <div class="form-group">
                      {!! Form::label('sms', 'SMS/WhatsApp', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::text('sms', $pengaturan->sms, ['class'=>'form-control', 'id'=>'sms', 'maxlength'=>'12']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('bbm', 'BBM', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::text('bbm', $pengaturan->bbm, ['class'=>'form-control', 'id'=>'bbm', 'maxlength'=>'8']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('line', 'line@', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::url('line', $pengaturan->line, ['class'=>'form-control', 'id'=>'line', 'maxlength'=>'50']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('instagram', 'Instagram', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::url('instagram', $pengaturan->instagram, ['class'=>'form-control', 'id'=>'instagram', 'maxlength'=>'50']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                      	{!! Form::email('email', $pengaturan->email, ['class'=>'form-control', 'id'=>'email']) !!}
                      </div>
                    </div>

                  </div><!-- /.tab-pane -->
                  
                  <div class="form-group">
                  	<div class="col-sm-offset-2 col-sm-10">
                    	{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                      <label></label>
                      <div class="col-sm-10">
                      	<p></p>
                      </div>
                    </div>
                  
                </div><!-- /.tab-content -->
                {!! Form::close() !!}
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
          </div> <!-- /.row -->
          <!-- END CUSTOM TABS -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


  <script type="text/javascript">
    $("#provinsi_id").change(function(){
        $.ajax({
            url: "/dw-admin/setting/kabupaten",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { id : $("#provinsi_id").val() },
            dataType: 'json',
            success: function(data) {
                var kabupaten = $("#kabupaten_id"), options = '';
                kabupaten.empty();

                for(var i=0;i<data.length; i++)
                {
                    options += "<option value='"+data[i].id+"'>"+ data[i].nama_kabupaten +"</option>";
                }
                $("#hkabupaten").remove();
                $("#kabupaten_id").append(options);
                $("#kabupaten_id").fadeIn();

            },error:function(){ 
                alert("error!!!!");
            }
        }); 
    });
    </script>
@endsection