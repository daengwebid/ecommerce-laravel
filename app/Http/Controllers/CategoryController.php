<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Response;
use App\Category;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengaturan = Setting::find(1);
        $kategori = Category::orderBy('nama_kategori', 'asc')->paginate(10);
        return view('admin.kategori', [
            'pengaturan'=>$pengaturan,
            'kategori'  =>$kategori
        ]);
    }

    public function getSlug(Request $request)
    {
        $nama_kategori = str_slug($request->input('nama_kategori'));
        $dataslug = Category::where('slug', $nama_kategori)->first();
        $pesan = $dataslug == "" ? '0':'1';
        return response()->json([
                'nama_kategori'=>$nama_kategori,
                'pesan'=>$pesan
                ]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
            'slug'          => 'required|unique:categories'
            ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => $request->slug,
            'deskripsi'     => $request->input('deskripsi')
            ]);
        return redirect('/dw-admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('/dw-admin/category');
    }
}
