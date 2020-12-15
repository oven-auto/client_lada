<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannerCreateRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;
use App\Models\Banner;
use Storage;

class BannerController extends Controller
{
    public function index()
    {
    	$banners = Banner::get();
    	return view('back.banner.index',compact('banners'));
    }

    public function create()
    {
    	return view('back.banner.add');
    }

    public function store(BannerCreateRequest $request)
    {
    	$path = $request->file('img')->store('banners');
    	Banner::create(['img'=>$path]);
    	return redirect()->route('banners.index');
    }

    public function edit(Banner $banner)
    {
    	return view('back.banner.add',compact('banner'));
    }

    public function update(BannerCreateRequest $request,Banner $banner)
    {
    	if($request->has('img'))
    	{
    		Storage::delete($banner->img);
    		$path = $request->file('img')->store('banners');
    		$banner->update(['img'=>$path]);
    	}
    	return redirect()->route('banners.index');
    }

    public function delete(Banner $banner)
    {
    	Storage::delete($banner->img);
    	$banner->delete();
    }
}
