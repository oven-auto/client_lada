@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="mt-3 mb-4">{{isset($title)?$title:''}}</h1>
			</div>
		</div> 
		{{Form::open([
			'url'=>isset($car)?route('cars.update',$car):route('cars.store'),
			'files'=>true,
			'method'=>isset($car)?'PUT':'POST'
		])}}
			<div class="row">
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Название</span>
						</div>
						{{Form::text('name',isset($car)?$car->name:'',['placeholder'=>'Название','class'=>'form-control' , 'required'=>'required'])}}
					</div>

					@error('name')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror	
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Картинка</span>
						</div>
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="img" {{isset($car)?'':'required'}}>
						    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
						  </div>
					</div>	

					@error('img')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror	

					@isset($car)
						@if(!empty($car->img))
							<img src="{{asset('storage/'.$car->img)}}" style="width: 100%;">
						@endif
					@endisset


				</div>

			</div>

			<div class="row">
				<div class="col text-right">
					<div class="btn-group my-3">
						<a href="{{route('cars.index')}}" class="btn btn-danger">Выйти</a> 
						<button type="submit" class="btn btn-success">Сохранить</button>
					</div>	
				</div>
			</div>
		{{Form::close()}}
	</div>


@endsection