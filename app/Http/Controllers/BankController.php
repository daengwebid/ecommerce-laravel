<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Bank;

class BankController extends Controller
{
    public function index()
    {
    	$pengaturan = Setting::findOrFail(1);
    	$bank  = Bank::all();
    	return view('admin.bank', [
    		'pengaturan'	=> $pengaturan,
    		'bank'			=> $bank
    	]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nama_pemilik'	=> 'required',
    		'no_rekening'	=> 'required',
    		'nama_bank'		=> 'required',
    		'kode_bank'		=> 'required'
    	]);

    	Bank::create($request->all());
    	return redirect('/dw-admin/payment');
    }

    public function destroy($id)
    {
    	Bank::findOrFail($id)->delete();
    	return redirect('/dw-admin/payment');
    }
}
