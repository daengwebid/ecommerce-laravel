<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Provinsi;
use App\Kabupaten;
use Response;

class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengaturan = Setting::find(1);
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::find($pengaturan->kabupaten_id);
        
        return view('admin.setting', [
            'pengaturan'    =>$pengaturan,
            'provinsi'      =>$provinsi,
            'kabupaten'     =>$kabupaten
            ]);
    }

    public function getKabupaten(Request $request)
    {
        $provinsi_id = $request->id;
        $kabupaten = Kabupaten::where('provinsi_id', '=', $provinsi_id)->get();
        foreach ($kabupaten as $kabupaten) {
            $a[] = array(
                'id'=>$kabupaten->id,
                'nama_kabupaten'=>$kabupaten->nama_kabupaten
                );
        }
        return Response::json($a); 
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);
        $setting->update($request->all());
        return redirect('/dw-admin/setting');
    }

}
