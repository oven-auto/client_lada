<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Admin\CarRequest;
use App\Http\Requests\Admin\CarUpdateRequest;
use Storage;
class CarController extends Controller
{
    public function index()
    {
    	$cars = Car::orderBy('name')->get();
    	return view('back.car.index',compact('cars'));
    }

    public function create()
    {
    	$title = 'Новая модель';
    	return view('back.car.add',compact('title'));
    }

    public function store(CarRequest $request)
    {
    	$path = $request->file('img')->store('cars');

    	$car = Car::create([
    		'name'=>$request->get('name'),
    		'img'=>$path
    	]);

    	return redirect()->route('cars.edit',$car);
    }

    public function edit(Car $car)
    {
    	$title = 'Изменить модель';
    	return view('back.car.add',compact('title','car'));
    }

    public function update(CarUpdateRequest $request, Car $car)
    {
    	$path = $car->img;
    	if($request->has('img'))
    	{
    		Storage::delete($car->img);
    		$path = $request->file('img')->store('cars');
    	}

    	$car->update([
    		'name'=>$request->get('name'),
    		'img'=>$path
    	]);

    	return redirect()->route('cars.edit',$car);
    }

    public function delete(Car $car)
    {
    	Storage::delete($car->img);
    	$car->delete();
    }
}
