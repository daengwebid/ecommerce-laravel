<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengaturan = Setting::findOrFail(1);
        $order = Order::orderBy('created_at', 'desc')->with('customer', 'order_detail')->get();
        return view('admin.order.index', [
            'pengaturan'    => $pengaturan,
            'order'         => $order  
        ]);
    }

    public function detail_order($invoice)
    {
        $pengaturan = Setting::findOrFail(1);
        $order = Order::where('invoice', '=', $invoice)->with('customer', 'order_detail')->first();
        return view('admin.order.detail', [
            'pengaturan'    => $pengaturan,
            'order'         => $order
        ]);
    }

    public function updateStatusOrder(Request $request)
    {
        $this->validate($request, [
            'status_order'  => 'required',
            'invoice'       => 'required'
        ]);

        Order::where('invoice', '=', $request->invoice)->update([
            'status_order'  => $request->status_order,
            'catatan_status'=> $request->input('catatan_status')
        ]);

        return redirect('/dw-admin/order/' . $request->invoice);
    }

    public function waiyPayment()
    {
        $pengaturan = Setting::findOrFail(1);
        $order = Order::where('paid_id', '=', null)->orderBy('created_at', 'desc')->with('customer', 'order_detail')->get();
        return view('admin.order.index', [
            'pengaturan'    => $pengaturan,
            'order'         => $order  
        ]);
    }
}
