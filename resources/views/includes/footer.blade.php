<div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3 ><strong>OFFICIAL</strong></h3>
                    
                    <ul class="list-group contact">
                        <li><i class="fa fa-mobile"> SMS/Whatsapp : {{ $pengaturan->sms }}</i></li>
                        <li><i class="fa fa-book"> BBM : {{ $pengaturan->bbm }}</i></li>
                        <li><i class="fa fa-instagram"></i> <a href="{{ $pengaturan->instagram }}" style="text-decoration: none;"> Follow Me</a></li>
                        <li><i class="fa fa-envelope-square"> </i><a href="mailto:{{ $pengaturan->email }}" style="text-decoration: none;"> {{ $pengaturan->email }}</a></li>
                    </ul>
                    
                </div>
                <div class="col-md-3">
                    <h3><strong>JALAN PINTAS</strong></h3>
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
                <div class="col-md-3">
                    <h3><strong>LAYANAN</strong></h3>
                        <ul class="list-group contact">
                            <li><a href="{{ url('/cara-belanja') }}" style="text-decoration: none; color: #fff; a:hover: #C1AA9B;">Cara Belanja </a></li>
                            <li><a href="{{ url('/metode-pembayaran') }}" style="text-decoration: none; color: #fff;">Cara Pembayaran</a></li>
                            <li><a href="{{ url('/retur-barang') }}" style="text-decoration: none; color: #fff;"> Retur Barang</a></li>
                            <li><a href="{{ url('/testimoni') }}" style="text-decoration: none; color: #fff;"> Testimoni</a></li>
                        </ul>
                </div>
                <div class="col-md-3">Widget 4</div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}" style="text-decoration: none; color: #000"><strong>{{ $pengaturan->nama_toko }}</strong></a></p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right">Develop By <a href="http://makassarnetwork.info/">MakassarNetwork</a></p>
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