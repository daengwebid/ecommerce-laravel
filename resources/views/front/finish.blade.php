@extends('layouts.front')

@section('title')
    <title>Transaksi Berhasil | {{ $pengaturan->nama_toko }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Finish</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row" id="content">
        <div class="col-md-12">
            @if (session('invoice'))
            <div class="panel panel-default">
                <div class="panel-heading">Terima Kasih, Pesanan Anda Telah Kami Terima</div>
                <div class="panel-body">
                    <p>Hai <strong>{{ session('customer') }}</strong></p>
                    <p>Terima kasih telah berbelanja di <strong>{{ $pengaturan->nama_toko }}.</strong></p>
                    <p>Bersama dengan ini kami juga telah mengirimkan detail pesanan anda ke email <b><i>{{ session('email') }}</i></b> (Silahkan cek inbox/spam box).</p>
                    <p class="text-center"><img src="{{ asset('/img/progres.png') }}" class="img-responsive"></p>
                    <p>Invoice anda : </p>
                    <input type="text" name="invoice" value="#{{ session('invoice') }}" disabled="" style="background: #000; color: #fff">
                    <p>Silahkan cek email kedua berisi <b>konfirmasi pesanan</b> dari kami sebelum melakukan transfer</p>
                </div>
            </div> 
            @else
            <div class="alert alert-danger" role="alert">
                <p>Belum ada barang yang ditambahkan ke keranjang belanja. </p>
            </div>
            
            @endif
        </div>
    </div>
</div>
@endsection
