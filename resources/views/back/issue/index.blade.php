@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="mt-3 mb-4">Мои выдачи</h1>
			</div>
		</div> 

		@foreach($issues as $itemIssue)
		<div class="row d-flex align-items-center mb-1 pb-1 border-bottom">
			<div class="col-1">
				<a href="{{route('issues.edit',$itemIssue)}}">Просмотр</a>
			</div>

			<div class="col-1">
				{{$itemIssue->firstname}}
			</div>
			<div class="col-1">
				{{$itemIssue->lastname}}
			</div>
			<div class="col-2">
				{{$itemIssue->car->name}}
			</div>
			
			<div class="col-2">
			</div>

			<div class="col">
				<div class="row">
					<div class="col">
						<div class="btn-group">
							<span class="btn btn-dark"> {{$itemIssue->formated_begin_date}}</span>
							<span class="btn btn-success"> {{$itemIssue->formated_begin_time}}</span>
						</div>
					</div>

					<div class="col">
						<div class="btn-group">
							<span class="btn btn-dark"> {{$itemIssue->formated_end_date}}</span>
							<span class="btn btn-success"> {{$itemIssue->formated_end_time}}</span>
						</div>
					</div>
				</div>
			</div>			
		</div>
		@endforeach
	</div>
@endsection