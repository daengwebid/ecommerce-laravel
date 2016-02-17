<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    
    @yield('title')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body role="document">
    
    <!-- Fixed navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">{{ $pengaturan->nama_toko }}</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                    <li><a href="#contact">Cara Transaksi</a></li>
                    <li><a href="#metode">Metode Pembayaran</a></li>
                    <li><a href="#return">Return Barang</a></li>
                    <li><a href="#return">Konfirmasi Pembayaran</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-sm-5 col-lg-5 col-md-5"></div>    
            
            <div class="col-sm-5 col-lg-5 col-md-5">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span>
                        </button>
                        
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">         
                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-md-2 pull-right">
                <a href="{{ url('/cart') }}" class="pull-right" style="text-decoration: none;"> 
                    <span class="fa fa-shopping-cart fa-2x"></span> Cart
                </a>
            </div>
        </div>

        <div class="clearfix divider"><br></div>

    </div>

    @yield('content')
    <!-- /.container -->


    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3 ><strong>Contact</strong></h3>
                    
                    <ul class="list-group contact">
                        <li><i class="fa fa-mobile"> Call/SMS : {{ $pengaturan->sms }}</i></li>
                        <li><i class="fa fa-whatsapp"> Whatsapp : {{ $pengaturan->sms }}</i></li>
                        <li><i class="fa fa-instagram"></i> <a href="{{ $pengaturan->instagram }}"> Follow Me</a></li>
                        <li><i class="fa fa-envelope-square"> </i><a href="mailto:{{ $pengaturan->email }}"> {{ $pengaturan->email }}</a></li>
                    </ul>
                    
                </div>
                <div class="col-md-3">
                    <h3>Jalan Pintas</h3>
                    <div class="input-group">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="input-group">     
                                    <input type="text" class="form-control" name="cari_produk" placeholder="Cari Produk">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                                <div class="clearfix divider"><br></div>
                                <div class="input-group">     
                                    <input type="text" class="form-control" name="cari_order" placeholder="Cek Status Order">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="label-control"></label>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">Widget 3</div>
                <div class="col-md-3">Widget 4</div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>All Rights Reserved @ <a href="{{ url('/') }}">{{ $pengaturan->nama_toko }}</a> | <?php echo date('Y'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right">Develop By <a href="http://daengweb.biz.id">DaengWeb</a></p>
                    </div>
                </div>
            </div>
        </div>
        <span id="top-link-block" class="hidden">
            <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <strong><i class="fa fa-angle-up" id="icon-top"></i></strong>
            </a>
        </span>
    </div><!-- #footer -->

<script type="text/javascript">
    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
    }
</script>
</body>

</html>