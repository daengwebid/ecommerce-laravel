<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Slide;
use File;

class SlideController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$pengaturan = Setting::findOrFail(1);
    	$slide = Slide::all();
    	return view('admin.slide.index', [
    		'pengaturan'	=> $pengaturan,
    		'slide'			=> $slide
    	]);
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
    		'title' 		=> 'required',
    		'deskripsi'		=> 'required',
    		'url'			=> 'required|url',
    		'banner_slide'	=> 'required|image'
    	]);

    	if ($request->hasFile('banner_slide')) {
    		$file = $request->file('banner_slide');
    		$filename = str_random(6) . "." . $file->getClientOriginalExtension();
    		$filesize = $file->getClientSize();
    		$path = public_path() . '/upload/banner';
    		$file->move($path, $filename);

    		Slide::create([
    			'banner_slide'	=> $filename,
    			'title'			=> $request->title,
    			'deskripsi'		=> $request->deskripsi,
    			'url'			=> $request->url,
    			'size'			=> $filesize
    		]);
    	}

    	return redirect('/dw-admin/slide');
    }

    public function destroy($id)
    {

    	$slide = Slide::findOrFail($id);
    	File::delete('/upload/banner' . $slide->banner_slide);
    	$slide->delete();
    	return redirect('/dw-admin/slide');
    }
}
