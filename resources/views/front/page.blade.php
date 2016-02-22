@extends('layouts.front')

@section('title')
    <title>{{ $page->judul }} | {{ $pengaturan->nama_toko }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active text-capitalize"><i>{{ $page->judul }}</i></li>
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
                            <div class="col-md-12">
                                <h3 class="text-capitalize"><strong>{{ $page->judul }}</strong></h3>
                                <br>
                                {!! $page->content !!}
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection