@extends('layouts.front')

@section('title')
    <title>Keranjang | {{ $pengaturan->nama_toko }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Checkout</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row" id="content">
        <div class="col-md-12">
            @if(count($cart))
            {!! Form::open(array('url'=>'/update_cart')) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">Keranjang Belanja</div>

                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td>
                                @if ($item->options->name_photo != "")
                                    <img src="{{ asset('upload/img/' . $item->options->name_photo) }}" alt="{{ $item->name }}" class="img-responsive thumbnail" style="min-height: 25px; height: 50px; min-width: 20px; width: 50px;">
                                @else
                                    <img src="{{ asset('img/not-available.jpg') }}" alt="{{ $item->name }}" class="img-responsive thumbnail" style="min-height: 25px; height: 50px; min-width: 20px; width: 50px;">
                                @endif
                            </td>
                            <td>
                                <h4><a href="">{{ $item->name }}</a></h4>
                                <small>Kode Produk: {{ $item->id }}</small>
                            </td>
                            <td>
                                <p>Rp. {{ $item->price }}</p>
                            </td>
                            <td>
                                <p>{{ $item->options->berat }} <small>Gram</small></p>
                                {!! Form::hidden('berat[]', $item->options->berat, ['class' => 'form-control'] ) !!}
                            </td>
                            <td>
                                <div class="col-md-7">
                                <input class="form-control" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2" readonly="readonly" >
                                </div>
                            </td>
                            <td>
                                <p class="cart_total_price">Rp. {{ $item->subtotal }}</p>
                            </td>
                            <td class="cart_delete icon-circle icon-zoom">
                                <a class="cart_quantity_delete" href='{{ url("d_cart?kode_produk=$item->id") }}'><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"><p class="pull-right text-uppercase"><strong>Total</strong></p></td>
                            <td><p class="text-center"><strong>Rp. {{ $total }}</strong></p></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-credit-card-alt"></i> Checkout</button>
            </div>
            {!! Form::close() !!}
            @else
                <div class="alert alert-danger" role="alert">
                    <p>Belum ada barang yang ditambahkan ke keranjang belanja. </p>
                </div>
                
            @endif
        </div>
    </div>
</div>
@endsection
