@extends('layouts.front')

@section('content')
	@isset($issue)
	<canvas id="canvas" style="z-index:999;width:100%;height: 100vh;position: absolute;top: 0px;left: 0px;"></canvas>

	@include('front.monitor.animation')

	<div class="container-fluid">
		<div class="row d-flex align-items-center">
			<div class="col-7">
				<img src="{{asset('storage/'.$issue->car->img)}}" id="car">
			</div>

			<div class="col-5">
				<h1>Уважаемый</h1>
				<h1>{{$issue->full_name}}</h1>
				<h1>Поздравляем с Вашей новой</h1>
				<h1>{{$issue->car->name}}!</h1>
			</div>
		</div>	
	</div>

	<div class="footer">
		<img src="{{asset('storage/footer/bottom.png')}}">
	</div>

	@endisset
@endsection