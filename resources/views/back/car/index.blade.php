@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="mt-3 mb-4">Мои модели</h1>
			</div>
		</div> 

		<div class="row">
			@foreach($cars as $itemCar)
				<div class="col-3 ">
					<a href="{{route('cars.edit',$itemCar)}}">
					<div class="text-center " style="background-position:center;background:url({{asset('storage/'.$itemCar->img)}});background-size: 100% 100%;height: 190px;background-repeat: no-repeat;">

					</div>
					<div class="">{{$itemCar->name}}</div>
					</a>
				</div>
			@endforeach
		</div>

	</div>
@endsection