<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$pengaturan = Setting::findOrFail(1);
    	$page = Page::all();
    	return view('admin.page.index', [
    		'pengaturan'	=> $pengaturan,
    		'page'			=> $page
    	]);
    }

    public function frontPage($slug)
    {
        $pengaturan = Setting::findOrFail(1);
        $kategori = Category::all();
        $testimoni = Testimoni::where('status', '=', 1)->orderBy('created_at', 'desc')->take(10)->get();
        $bank = Bank::all();
        $page = Page::where('slug', '=', $slug)->first();
        return view('front.page', [
            'pengaturan'    => $pengaturan,
            'page'          => $page,
            'pengaturan'    => $pengaturan,
            'page'          => $page,
            'kategori'      => $kategori,
            'testimoni'     => $testimoni,
            'bank'          => $bank
        ]);
    }

    public function create()
    {
    	$pengaturan = Setting::findOrFail(1);
    	return view('admin.page.create', [
    		'pengaturan'	=> $pengaturan
    	]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'judul'	=> 'required|max:20',
    		'slug'	=> 'bail|required|unique:pages',
    		'content'	=> 'required'
    	]);

    	Page::create($request->all());
    	return redirect('/dw-admin/pages');
    }

    public function edit($id)
    {
    	$pengaturan = Setting::findOrFail(1);
    	$page = Page::findOrFail($id);
    	return view('admin.page.edit', [
    		'pengaturan'	=> $pengaturan,
    		'page'			=> $page
    	]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'judul'	=> 'required',
    		'slug'	=> 'required',
    		'content'	=> 'required'
    	]);
    	$page = Page::findOrFail($id);
    	$page->update($request->all());
    	return redirect('/dw-admin/pages');
    }

    public function destroy($id)
    {
    	Page::findOrFail($id)->delete();
    	return redirect('/dw-admin/pages');
    }
}
