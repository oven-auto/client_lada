<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class MonitorController extends Controller
{
    public function index()
    {
    	$now = date('Y.m.d H:i',strtotime("+3 hours"));

    	$issue = Client::with('car')
    		->whereDate('issue_begin','<=',$now)
    		->whereDate('issue_end','>=',$now)
    		->first();
    	
    	return view('front.monitor.index',compact('issue'));
    }
}
