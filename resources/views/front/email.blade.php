<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
	<p>Terima kasih telah melakukan order <b>{{ $name }}</b></p>
	<p>INVOICE ID : <b>#{{ $invoice }}</b></p>
	<p>=============================</p>
	<p>Belanja anda : Rp. {{ $belanja }}</p>
	<p>Biaya Kirim : Rp. ~ </p>
	<p>TOTAL : {{ $belanja }}</p>
	<p>=============================</p>
	<br>
	<p>ALAMAT PENGIRIMAN</p>
	<p>=============================</p>
	<p>Atas Nama : {{ $name }}</p>
	<p>Alamat : {{ $alamat }}</p>
	<p>No Telp : {{ $no_telp }}</p>

	<br>
	<p>DETAIL ORDER</p>
	<p>=============================</p>
	@for ($i=0; $i<count($detailorder); $i++)
	<ol>
		<li>{{ $detailorder[$i]['nama_produk'] }} = {{ $detailorder[$i]['qty'] }} ( {{ $detailorder[$i]['berat'] }} gram) @ Rp. {{ $detailorder[$i]['harga'] }}</li>
	</ol>
	@endfor
	<br>
	<p><b>Silahkan Tunggu Email Konfirmasi pesanan sebelum melakukan transfer</b></p>
	<br>
	<p>Best Regards</p>
	<p><strong>{{ $nama_toko }}</strong></p>
	<p>No Telp: {{ $sms }}/{{ $bbm }}</p>
</body>
</html>