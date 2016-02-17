<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Setting;
use App\Order;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaturan = Setting::findOrFail(1);
        $newOrder = Order::where('status_order', '=', 'Pending');
        $orderComplete = Order::where('status_order', '=', 'Complete');
        $customer = Customer::all();
        return view('admin.dashboard', [
            'pengaturan'    => $pengaturan,
            'neworder'      => $newOrder,
            'ordercomplete' => $orderComplete,
            'customer'      => $customer
        ]);
    }
}
