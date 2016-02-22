@extends('layouts.front')

@section('title')
    <title>{{ $product->nama_produk }} | {{ $pengaturan->nama_toko }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active text-capitalize"><i>{{ $product->category->nama_kategori }}</i></li>
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
                    <div class="panel panel-default panel-sm">
                        <div class="panel-body">        
                            <div class="col-md-5">
                                <div class="thumbnail img-responsive">
                                    @if ($product->media_image_id != null)
                                        <a href="{{ url('/produk/' . $product->slug) }}"><img src="{{ asset('upload/img/' . $product->media_image->name_photo) }}" alt="{{ $product->nama_produk }}" style="min-height:50px; height:250px; min-width:50px; width: 250px;" class="morph"></a>
                                    @else
                                        <a href="{{ url('/produk/' . $p->slug) }}"><img src="{{ asset('img/not-available.jpg') }}" alt="{{ $product->nama_produk }}" style="min-height:50px; height:250px; min-width:50px; width: 250px;" class="morph"></a>
                                    @endif     
                                </div>
                            </div>  
                            <div class="7">
                                <h3 class="text-capitalize">{{ $product->nama_produk }}</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><i class="fa fa-file-code-o"></i> Kode Produk</td>
                                                <td>: {{ $product->kode_produk }}</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-briefcase"></i> Kategori</td>
                                                    <td>: <a href="{{ url('/kategori/' . $product->category->slug) }}" style="text-decoration: none;">{{ $product->category->nama_kategori }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-shopping-basket"></i> Berat</td>
                                                    <td>: {{ $product->berat }} <small>gr</small></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-money"></i> Harga</td>
                                                    <td>: Rp. {{ $product->harga_jual }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::open(array('url' => '/cart', 'class' => 'form_submit')) !!}
                                            <button type="submit" class="btn btn-success btn-sm" id="beli"><i class="fa fa-shopping-cart"></i> Beli Sekarang</button>
                                            <input type="hidden" name="kode_produk" id="kode_produk" value="{{ $product->kode_produk }}">
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab1default" data-toggle="tab"><i class="fa fa-bookmark"></i> Deskripsi Produk</a></li>
                                                    </ul>
                                            </div>
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="tab1default">
                                                        {!! $product->deskripsi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;" id="pesanmodal">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-info-circle fa-2x"></i></h4>
                    </div>
                    <div class="modal-body">
                        <p><strong class="pmodal"></strong> Berhasil Ditambahkan Ke Keranjang.</p>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Lanjutkan Belanja</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/cart') }}"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-shopping-cart"></i> Keranjang</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".form_submit").submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize(); 
            var formAction = $(this).attr("action"); 
            var formMethod = $(this).attr("method");

            $.ajaxSetup({
                headers: {
                    "X-XSRF-Token": $("meta[name='csrf_token']").attr("content")
                }
            });

            $.ajax({
                type  : formMethod,
                url   : formAction,
                data  : formData,

                success: function(data) {
                
                    waitingDialog.show('Menambahkan Ke keranjang, Silahkan Tunggu...');
                    setTimeout(function(){
                        waitingDialog.hide();
                        $("#pesanmodal").modal();
                    }, 1500);
                
                },
                error : function() {

                }
            });
            return false; 
        });
    });
</script>

<script type="text/javascript">
    var waitingDialog = waitingDialog || (function ($) {
    'use strict';

    var $dialog = $(
        '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
        '<div class="modal-dialog modal-m">' +
        '<div class="modal-content">' +
            '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
            '<div class="modal-body">' +
                '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
            '</div>' +
        '</div></div></div>');

    return {
        show: function (message, options) {
            if (typeof options === 'undefined') {
                options = {};
            }
            if (typeof message === 'undefined') {
                message = 'Loading';
            }
            var settings = $.extend({
                dialogSize: 'm',
                progressType: '',
                onHide: null
            }, options);

            $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
            $dialog.find('.progress-bar').attr('class', 'progress-bar');
            if (settings.progressType) {
                $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
            }
            $dialog.find('h3').text(message);
            if (typeof settings.onHide === 'function') {
                $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
                    settings.onHide.call($dialog);
                });
            }
            $dialog.modal();
        },
        hide: function () {
            $dialog.modal('hide');
        }
    };

})(jQuery);
</script>

@endsection