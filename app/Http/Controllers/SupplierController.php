<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Response;
use App\Supplier;
use App\Kabupaten;

class SupplierController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:  9106f5d054160b2916a6661d2603fcf2"
            ),
        ));

        $ongkir = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $kota = json_decode($ongkir, TRUE);
        }

        $pengaturan = Setting::find(1);
        $supplier = Supplier::orderBy('nama_supplier', 'asc')->get();
        return view('admin.supplier.supplier', [
            'pengaturan'    => $pengaturan,
            'supplier'      => $supplier,
            'kota'          => $kota
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'city_id'       => 'required',
            'kota_supplier' => 'required',
            'website'       => 'required',
            'contact'       => 'required'
            ]);
        $s = new Supplier;
        $s->nama_supplier = $request->nama_supplier;
        $s->kota_supplier = $request->kota_supplier;
        $s->origin = $request->city_id;
        $s->website = $request->website;
        $s->contact = $request->contact;
        $s->save();
        
        return redirect('/dw-admin/supplier');
    }

    public function show($id)
    {
        $pengaturan = Setting::find(1);
        $supplier = Supplier::orderBy('nama_supplier', 'asc')->paginate(10);
        $detail = Supplier::find($id);
        return view('admin.supplier.show_supplier', [
            'pengaturan'    => $pengaturan,
            'supplier'      => $supplier,
            'detail'        => $detail
            ]);
    }

    public function edit($id)
    {
        $pengaturan = Setting::find(1);
        $supplier = Supplier::orderBy('nama_supplier', 'asc')->paginate(10);
        $edit = Supplier::find($id);
        return view('admin.supplier.edit_supplier', [
            'pengaturan'    => $pengaturan,
            'supplier'      => $supplier,
            'edit'          => $edit
            ]);
    }

    public function update(Request $request, $id)
    {
        $data = Supplier::find($id);
        $data->update($request->all());
        return redirect('/dw-admin/supplier');
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        return redirect('/dw-admin/supplier');
    }
}
