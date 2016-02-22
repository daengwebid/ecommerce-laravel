<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Category;
use App\Testimoni;
use App\Bank;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$pengaturan = Setting::findOrFail(1);
    	$testimoni = Testimoni::orderBy('created_at', 'desc')->take(10)->get();
    	return view('admin.testimoni.index', [
    		'pengaturan'	=> $pengaturan,
    		'testimoni'		=> $testimoni
    	]);
    }

    public function isiTestimoni()
    {
    	$pengaturan = Setting::findOrFail(1);
    	$kategori = Category::all();
    	$testimoni = Testimoni::where('status', '=', 1)->orderBy('created_at', 'desc')->take(10)->get();
        $bank = Bank::all();
    	return view('front.testimoni', [
    		'pengaturan'	=> $pengaturan,
    		'kategori'		=> $kategori,
    		'testimoni'		=> $testimoni,
            'bank'          => $bank
    	]);
    }

    public function createTestimoni(Request $request)
    {
    	$this->validate($request, [
    		'nama'	=> 'required|max:20',
    		'email'	=> 'required|email',
    		'no_hp'	=> 'required|max:12',
    		'pesan'	=> 'required|max: 160'
    	]);

    	Testimoni::create(['nama' => $request->nama, 'email' => $request->email, 'no_hp' => $request->no_hp, 'pesan' => $request->pesan, 'status' => 0]);
    	return redirect('/testimoni')->with('status', 'Testimoni Berhasil Di Kirim, Terima Kasih');
    }

    public function edit($id)
    {
    	$pengaturan = Setting::findOrFail(1);
    	$testimoni = Testimoni::findOrFail($id);
    	return view('admin.testimoni.edit', [
    		'pengaturan'	=> $pengaturan,
    		'testimoni'		=> $testimoni
    	]);
    }

    public function update(Request $request, $id)
    {
    	$testimoni = Testimoni::findOrFail($id);
    	$testimoni->update(['status' => $request->input('status')]);
    	return redirect('/dw-admin/testimoni');
    }

    public function destroy($id)
    {
    	Testimoni::find($id)->delete();
        return redirect('/dw-admin/testimoni');
    }
}
