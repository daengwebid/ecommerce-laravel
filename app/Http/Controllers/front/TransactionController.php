<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Order;
use App\Order_detail;
use Cart;
use DB;
use App\Setting;
use Session;
use Mail;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nama_lengkap'	=> 'required',
    		'no_hp'			=> 'required|max:12',
    		'email'			=> 'required',
    		'pinbbm'		=> 'max:8',
    		'alamat'		=> 'required',
    		'province'		=> 'required',
    		'city'			=> 'required',
    		'kode_pos'		=> 'required'
    		]);
    	
    	DB::beginTransaction();
    	$customer = Customer::create([
    				'nama_lengkap'	=> $request->nama_lengkap,
    				'no_hp'			=> $request->no_hp,
    				'email'			=> $request->email,
    				'pinbbm'		=> $request->pinbbm
    	]);
	    	if (!$customer)
	    	{
	    		DB::rollback();
	    	}

	    $lastInvoice = Order::orderBy('invoice', 'desc');
	    	if ($lastInvoice->get()->count() == 0) {
	    		$invoiceId = 1;
	    	} else {
	    		$invoiceId = $lastInvoice->first()->invoice + 1;
	    	}
	    $generateInvoice = str_pad($invoiceId, 5, "2100", STR_PAD_LEFT);

	    $order = Order::create([
	    	'customer_id'	=> $customer->id,
	    	'invoice'		=> $generateInvoice,
	    	'paid_id'		=> NULL,
	    	'jne'			=> $request->input('jne'),
	    	'province'		=> $request->province,
	    	'city'			=> $request->city,
	    	'kode_pos'		=> $request->kode_pos,
	    	'alamat'		=> $request->alamat,
	    	'catatan'		=> $request->input('catatan'),
	    	'status_order'	=> 'Pending'
	    ]);
	    	if (!$order) {
	    		DB::rollback();
	    	}
	    $cart = Cart::content();
	    foreach ($cart as $keranjang) {
	    	$data[] = ['kode_produk' 	=> $keranjang->id, 
	    				'name' 			=> $keranjang->name, 
	    				'qty' 			=> $keranjang->qty,
	    				'berat'			=> $keranjang->options->berat,
	    				'harga'			=> $keranjang->price
	    			];
	    }

	    for ($i=0; $i<count($data); $i++) {
	    	$order_detail = Order_detail::create([
	    		'order_id'		=> $order->id,
	    		'kode_produk'	=> $data[$i]['kode_produk'],
	    		'nama_produk'	=> $data[$i]['name'],
	    		'qty'			=> $data[$i]['qty'],
	    		'berat'			=> $data[$i]['berat'],
	    		'harga'			=> $data[$i]['harga']
	    	]);
	    }
	    DB::commit();
	    Cart::destroy();

	    $lastOrder = Order_detail::where('order_id', '=', $order->id)->get();
	    foreach ($lastOrder as $lo) {
	    	$detailorder[] = ['nama_produk' => $lo->nama_produk,
	    						'qty' => $lo->qty,
	    						'harga' => $lo->harga,
	    						'berat' => $lo->berat
	    					];
	    }

	    for ($l=0; $l<count($detailorder); $l++) {
	    	$totalblj[] = $detailorder[$l]['harga'];
	    }

	    $totalbelanja = array_sum($totalblj);
	    $emailadmin = Setting::findOrFail(1);

	    $data = array(
            'name' 			=> $customer->nama_lengkap,
            'alamat'		=> $order->alamat,
            'no_telp'		=> $customer->no_hp,
            'emailto' 		=> $customer->email,
            'invoice' 		=> $order->invoice,
            'belanja' 		=> $totalbelanja,
            'detailorder'	=> $detailorder,
            'emailfrom'		=> $emailadmin->email,
            'nama_toko'		=> $emailadmin->nama_toko,
            'sms'			=> $emailadmin->sms,
            'bbm'			=> $emailadmin->bbm
        );

        Mail::send('front.email', $data, function ($message) use ($data) {
            $message->from($data['emailfrom'], $data['nama_toko'] . ' | Detail Pesanan');
            $message->to($data['emailto'])->subject('Detail Pesanan Anda #' . $data['invoice']);
            $message->bcc($data['emailfrom'], $data['nama_toko'] . ' | Detail Pesanan');
        });

	    return redirect('/finish')->with(['invoice' => $order->invoice, 'customer' => $customer->nama_lengkap, 'email' => $customer->email]);
    }

    public function finishTransaction()
    {
    	$pengaturan = Setting::find(1);
    	$cart = Cart::content();
    	return view('front.finish', [
    		'pengaturan'	=> $pengaturan,
    		'cart'			=> $cart
    	]);
    }

}
