<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Banner;
use DB;

class MonitorController extends Controller
{
    public function index()
    {
    	$now = date('Y.m.d H:i');
        
        //DB::enableQueryLog();
    	$issue = Client::with('car')
    		->whereDate('issue_begin','<=',   DB::raw('CURRENT_DATE'))
    		->whereDate('issue_end','>=',     DB::raw('CURRENT_DATE'))
            ->whereTime('issue_begin','<=',   DB::raw('CURRENT_TIME'))
            ->whereTime('issue_end','>=',     DB::raw('CURRENT_TIME'))
    		->first();
        //dump(date('d-m-Y h:i'));
        //dd(DB::getQueryLog());
        
        if($issue)   
        {
            $refresh = 30;
            return view('front.monitor.index',compact('issue','refresh'));
        }
        else
        {
            $banners = Banner::get();
            $refresh = 10*$banners->count();
            return view('front.monitor.banners',compact('banners','refresh'));
        }
    }
}
