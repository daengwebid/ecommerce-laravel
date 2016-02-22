@extends('layouts.front')

@section('title')
    <title>Testimoni | {{ $pengaturan->nama_toko }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Testimoni</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="row" id="content">
        <div class="col-md-3">
            @include('includes.sidebar')
        </div>

        <div class="col-md-9">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">From Testimoni</div>
                            <div class="panel-body">
                                {!! Form::open(array('url' => '/testimoni', 'class' => 'form-horizontal')) !!}
                                
                                @if (session('status'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="glyphicon glyphicon-info-sign"></i> Pemberitahuan</h4>
                                    <p>{{ session('status') }}</p>
                                </div>
                                @elseif (count($errors) > 0)
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

                                <div class="form-group">
                                  {!! Form::label('nama', 'Nama *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('nama', null, ['class'=>'form-control', 'id'=>'nama', 'maxlength' => '20', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('email', 'Email *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('no_hp', 'No Hp *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('no_hp', null, ['class'=>'form-control', 'id'=>'no_hp', 'maxlength' => '12', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('pesan', 'Testimoni *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::textarea('pesan', null, ['class'=>'form-control', 'id'=>'pesan', 'maxlength' => '160', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        {!! Form::submit('Kirim', ['class'=>'btn btn-primary', 'id'=>'simpan']) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection