@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="mt-3 mb-4">{{isset($title)?$title:''}}</h1>
			</div>
		</div> 
		
		{{Form::open([
			'method'=>isset($issue)?'PUT':'POST',
			'url'=>isset($issue)? route('issues.update',$issue) : route('issues.store')
		])}}
			<div class="row">
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Имя</span>
						</div>
						{{Form::text('firstname',isset($issue)?$issue->firstname:'',['placeholder'=>'Имя','class'=>'form-control','required'])}}
					</div>	

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Фамилия</span>
						</div>
						{{Form::text('lastname',isset($issue)?$issue->lastname:'',['placeholder'=>'Фамилия','class'=>'form-control','required'])}}
					</div>	

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Модель</span>
						</div>
						{{Form::select('car_id',isset($cars)?$cars:[],isset($issue)?$issue->car_id:'',['class'=>'form-control','placeholder'=>'Выбирите модель','required'])}}
					</div>				
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Начало выдачи</span>
						</div>
						{{Form::date(
							'issue_begin_date',
							isset($issue)?$issue->formated_begin_date:'',
							['placeholder'=>'Выдача с','class'=>'form-control','required']
						)}}
						{{Form::time(
							'issue_begin_time',
							isset($issue)?$issue->formated_begin_time:'',
							['placeholder'=>'Выдача с','class'=>'form-control','required']
						)}}
					</div>	

					
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Конец выдачи</span>
						</div>
						{{Form::date('issue_end_date',isset($issue)?$issue->formated_end_date:'',['placeholder'=>'Выдача до','class'=>'form-control','required'])}}
						{{Form::time('issue_end_time',isset($issue)?$issue->formated_end_time:'',['placeholder'=>'Выдача до','class'=>'form-control','required'])}}
					</div>	
				</div>

			</div>

			<div class="row">
				<div class="col text-right">
					<div class="btn-group mb-3">
						<a href="{{route('issues.index')}}" class="btn btn-danger">Выйти</a> 
						<button type="submit" class="btn btn-success">Сохранить</button>
					</div>	
				</div>
			</div>
		{{Form::close()}}
	</div>
@endsection