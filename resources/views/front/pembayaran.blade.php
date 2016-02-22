@extends('layouts.front')

@section('title')
    <title>Konfirmasi Pembayaran | {{ $pengaturan->nama_toko }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Konfirmasi Pembayaran</li>
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
                        <div class="panel-heading">Form Konfirmasi Pembayaran</div>
                            <div class="panel-body">
                                {!! Form::open(array('url' => '', 'class' => 'form-horizontal')) !!}
                                
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
                                  {!! Form::label('invoice', '#InvoiceID *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('invoice', null, ['class'=>'form-control', 'id'=>'invoice', 'required'=>'required']) !!}
                                    <p id="pesan"></p>
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('nama_pemilik', 'Nama Pengirim *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('nama_pemilik', null, ['class'=>'form-control', 'id'=>'nama_pemilik', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('bank_from', 'Dari Bank *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('bank_from', null, ['class'=>'form-control', 'id'=>'bank_from', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('no_rekening', 'No Rekening *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::text('no_rekening', null, ['class'=>'form-control', 'id'=>'no_rekening', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('bank_to', 'Bank Tujuan *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    <select name="bank_to" class="form-control" id="bank_to">
                                        <option value="">Pilih</option>
                                        @foreach ($bank as $b)
                                            <option value="{{ $b->nama_bank }}">{{ $b->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('jumlah', 'Jumlah *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    {!! Form::number('jumlah', null, ['class'=>'form-control', 'id'=>'jumlah', 'required'=>'required']) !!}
                                  </div>
                                </div>

                                <div class="form-group">
                                  {!! Form::label('bukti_transfer', 'Bukti Transfer *', ['class'=>'control-label col-sm-3']) !!}
                                  <div class="col-sm-9"> 
                                    <input type="file" name="bukti_transfer" id="bukti_transfer" required="">
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        {!! Form::submit('Konfirmasi', ['class'=>'btn btn-primary', 'id'=>'simpan', 'disabled' => 'disabled']) !!}
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

<script type="text/javascript">
    $("#invoice").focusout(function(){
        $.ajax({
            url: "{{ route('pembayaran.cekinvoice') }}",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { invoice : $("#invoice").val() },
            dataType: 'json',
            success: function(data) {
                var invoice = $("#invoice");

                if (data.pesan == 0) {
                    $("#pesan").text("Invoice Tidak Ditemukan");
                    $("#pesan").css("color", "red");
                    $("#simpan").prop("disabled", true);
                } else {
                    $("#pesan").text("Invoice Ditemukan");
                    $("#pesan").css("color", "green");
                    $("#simpan").prop("disabled", false);
                }
                
            },error:function(){ 
                alert("error!!!!");
            }
        }); 
    });
</script>

@endsection