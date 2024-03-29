@extends('layouts.front')

@section('content')
	@isset($issue)
	<canvas id="canvas" style="z-index:999;width:100%;height: 100vh;position: absolute;top: 0px;left: 0px;"></canvas>

	@include('front.monitor.animation')
    
	<div class="container-fluid">
		<div style="width: 60%;float:left;">
				<img src="{{asset('storage/'.$issue->car->img)}}" id="car" style="width:100%;">
		</div>

		<div style="width: 39%; float:left; clear: right; padding-top:150px;">
				<h1>Уважаемый(ая)</h1>
				<h1>{{$issue->full_name}}</h1>
				<h1>Поздравляем с Вашей новой</h1>
				<h1>{{$issue->car->name}}!</h1>
		</div>	
	</div>

	<div class="footer">
		<img src="{{asset('storage/footer/bottom.png')}}">
	</div>

	@endisset
@endsection
