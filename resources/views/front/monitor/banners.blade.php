@extends('layouts.front')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide bannersSlider" data-ride="carousel">
	<div class="carousel-inner">
		@foreach($banners as $itemBanner)
		<div class="text-center carousel-item {{($loop->first)?'active':''}}">
			<img style="margin: auto;" class="d-block" src="{{asset('storage/'.$itemBanner->img)}}" alt="Первый слайд">
		</div>
		@endforeach
	</div>
</div>
@endsection