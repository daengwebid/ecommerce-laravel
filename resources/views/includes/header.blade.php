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
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/testimoni') }}">Testimoni</a></li>
                <li><a href="#contact">Cara Belanja</a></li>
                <li><a href="#metode">Metode Pembayaran</a></li>
                <li><a href="#return">Retur Barang</a></li>
                <li><a href="{{ url('/konfirmasi-pembayaran') }}">Konfirmasi Pembayaran</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

