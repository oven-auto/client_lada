<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Car;
use App\Http\Requests\Admin\IssueRequest;

class IssueController extends Controller
{
    public function index()
    {
    	$issues = Client::with('car')->orderBy('issue_begin')->get();
    	return view('back.issue.index',compact('issues'));
    }

    public function create()
    {
    	$cars = Car::orderBy('name')->get()->pluck('name','id');
    	$title = 'Новая выдача';
    	return view('back.issue.add',compact('cars','title'));
    }

    public function store(IssueRequest $request)
    {
    	$date_begin = $request->issue_begin_date.' '.$request->issue_begin_time;
    	$date_end = $request->issue_end_date.' '.$request->issue_end_time;
    	$data = $request->only(['firstname','lastname','car_id']);
    	$data['issue_begin'] = $date_begin;
    	$data['issue_end'] = $date_end;
    	
    	$issue = Client::create($data);
    	return redirect()->route('issues.edit',$issue);
    }

    public function edit(Client $issue)
    {
    	$cars = Car::orderBy('name')->get()->pluck('name','id');
    	$title = 'Редактировать выдачу';
    	return view('back.issue.add',compact('issue','cars','title'));
    }

    public function update(IssueRequest $request,Client $issue)
    {
    	$date_begin = $request->issue_begin_date.' '.$request->issue_begin_time;
    	$date_end = $request->issue_end_date.' '.$request->issue_end_time;
    	$data = $request->only(['firstname','lastname','car_id']);
    	$data['issue_begin'] = $date_begin;
    	$data['issue_end'] = $date_end;

    	$issue->update($data);
    	return redirect()->route('issues.edit',$issue);
    }

    public function delete()
    {

    }
}
