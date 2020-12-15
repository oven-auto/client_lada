@extends('layouts.app')

@section('content')
	<div class="container">
		{{Form::open([
			'url'=>isset($banner)?route('banners.update',$banner):route('banners.store'),
			'method'=>isset($banner)?'PUT':'POST',
			'files'=>true
		])}}
		<div class="row">
			<div class="col-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Баннер</span>
					</div>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" name="img" {{isset($banner)?'':'required'}}>
					    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
					  </div>
				</div>	

				@error('img')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror	

				@isset($banner)
					@if(!empty($banner->img))
						<img src="{{asset('storage/'.$banner->img)}}" style="width: 100%;">
					@endif
				@endisset


			</div>
		</div>

		<div class="row">
			<div class="col text-right">
				<div class="btn-group my-3">
					<a href="{{route('banners.index')}}" class="btn btn-danger">Выйти</a> 
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>	
			</div>
		</div>

		{{Form::close()}}

		
	</div>
@endsection