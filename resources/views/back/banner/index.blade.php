@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($banners as $itemBanner)
			
			<div class="col-3">
				<div style="background-image: url({{asset('storage/'.$itemBanner->img)}});background-size: cover;height: 200px;"></div>
				<a href="{{route('banners.edit',$itemBanner)}}">Изменить</a>
			</div>	

				
			@endforeach
		</div>
	</div>
@endsection