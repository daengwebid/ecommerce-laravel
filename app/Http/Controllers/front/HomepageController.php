<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Product;
use App\Category;
use App\Supplier;
use Cart;
use Response;
use RajaOngkir;

class HomepageController extends Controller
{
    
    public function index()
    {
        $pengaturan = Setting::find(1);
        $product = Product::orderBy('created_at', 'desc')->with('media_image', 'category')->take(8)->paginate(8);
        $kategori = Category::all();
        return view('front.index', [
            'pengaturan'    => $pengaturan,
            'product'       => $product,
            'kategori'      => $kategori
            ]);
    }

    public function cart(Request $request)
    {
        $cart = Cart::content();
        $total = Cart::total();
        $pengaturan = Setting::find(1);
        
        return view('front.cart', array(
                    'cart'          => $cart, 
                    'pengaturan'    => $pengaturan,
                    'total'         => $total
                ));
    }

    public function proses_cart(Request $request)
    {
        $kode_produk = $request->get('kode_produk');
        $product = Product::where('kode_produk', '=', $kode_produk)->with('media_image','supplier')->first();
        $name_photo = $product->media_image_id != null ? $product->media_image->name_photo : ""; 
            Cart::add(array(
                        'id'        => $kode_produk, 
                        'name'      => $product->nama_produk, 
                        'qty'       => 1, 
                        'price'     => $product->harga_jual,
                        'options'   => array (
                                        'berat'         => $product->berat, 
                                        'name_photo'    => $name_photo,
                                        'totalberat'    => 0
                                        )
                ));
        $cart = Cart::content();
        $nama_produk = $product->nama_produk;
        return response()->json([
                        'cart' => $nama_produk
                        ]);
    }

    public function delete_cart(Request $request) 
    {
        if ($request->get('kode_produk')) {
            $rowId = Cart::search(array('id' => $request->get('kode_produk')));
            Cart::remove($rowId[0]);
        } else {
            return redirect('/');
        }

        return redirect('/cart');
    }


    public function kategori($slug) 
    {
        $data_slug_kategori = Category::where('slug', '=', $slug)->first();
        $pengaturan = Setting::find(1);
        $product = Product::where('kategori_id', '=', $data_slug_kategori->id)->orderBy('created_at', 'desc')->with('media_image', 'category')->paginate(8);
        $kategori = Category::all();

        return view('front.kategori', [
            'pengaturan'    => $pengaturan,
            'product'       => $product,
            'kategori'      => $kategori,
            'head'          => $data_slug_kategori
            ]);
    }
    
    public function show($id)
    {
        $pengaturan = Setting::find(1);
        $product = Product::where('slug', '=', $id)->with('media_image', 'category')->first();
        $kategori = Category::all();
        return view('front.produk', [
            'pengaturan'    => $pengaturan,
            'product'       => $product,
            'kategori'      => $kategori
            ]);
    }

    public function checkout()
    {
        $provinsi = RajaOngkir::Provinsi()->all();

        $pengaturan = Setting::find(1);
        $cart = Cart::content();
        $total = Cart::total();
        
        return view('front.checkout', [
            'provinsi'      => $provinsi,
            'pengaturan'    => $pengaturan,
            'cart'          => $cart,
            'total'         => $total
            ]);
    }

    public function update_cart(Request $request)
    {
        $cart = Cart::content();
        foreach ($cart as $item) {
            $data[] = ['rowid' => $item->rowid, 'qty' => $item->qty, 'berat' => $item->options->berat];
            
        }
        for ($i=0; $i<count($data); $i++) {
            $beratakhir[] = $data[$i]['qty'] * $data[$i]['berat'] ;
        }
        
        $total = array_sum($beratakhir);
        for ($i=0; $i<count($data); $i++) {
            Cart::update($data[$i]['rowid'], array('options' => array('totalberat' => $total)));
        }
        return redirect('/checkout');
    }

    public function getCity(Request $request)
    {
        $kota = RajaOngkir::Kota()->byProvinsi($request->province)->get();
        
        for ($i=0; $i<count($kota); $i++) {
            $data[] = ['id' => $kota[$i]['city_id'],
                      'city_name' => $kota[$i]['city_name']
                    ];
        }
        return Response::json($data);
    }

    public function ongkir(Request $request)
    {

        $kota_asal = Supplier::first();

        $data = RajaOngkir::Cost([
            'origin'        => $kota_asal->origin, 
            'destination'   => $request->destination, 
            'weight'        => $request->weight, 
            'courier'       => 'jne', 
        ])->get();

        for ($i=0; $i<count($data[0]['costs']); $i++)
        {
            $hitung[] = ['service' => $data[0]['costs'][$i]['service'],
                        'description' => $data[0]['costs'][$i]['description'],
                        'biaya'  => $data[0]['costs'][$i]['cost'][0]['value'],
                        'etd'   => $data[0]['costs'][$i]['cost'][0]['etd']
            ];
        }
        return Response::json($hitung);
    }
    
}
