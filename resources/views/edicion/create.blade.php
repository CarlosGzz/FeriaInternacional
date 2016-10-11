@extends('layouts.app')

@section('pageTitle')
  Crear Edición
@stop
@section('content')

	@if(count($errors) > 0)
	<div class ="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10 panel panel-default">
		<div class = "panel-body">
			{!! Form::open(['route' => 'edicion.ediciones.store', 'method' => 'POST']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('name','Pais') !!}*
				{!! Form::text('pais','',['class'=>'form-control', 'placeholder' => 'Pais de la edicion', 'required']) !!}
			</div>
			<!--Fecha Inicio-->
			<div class="form-group">
				{!! Form::label('name','Fecha De Inicio') !!}*
				{!! Form::date('fechaInicio', \Carbon\Carbon::now(), ['class'=>'form-control','required']) !!}
			</div>
			<!--Fecha Final-->
			<div class="form-group">
				{!! Form::label('name','Fecha Final') !!}*
				{!! Form::date('fechaFinal', \Carbon\Carbon::now()->addMonths(6), ['class'=>'form-control','required']) !!}
			</div>
			<!--Logo-->
			<div class="form-group">
				{!! Form::label('logo','Logo') !!}
				{!! Form::text('logo','',['class'=>'form-control', 'placeholder' => 'Pais de la edicion']) !!}
			</div>
			<!--Estatus-->
			<div class="form-group">
				{!! Form::label('estatus','Estatus') !!}*
				{!! Form::select('estatus', ['activo' => 'Activo', 'inactivo' => 'Inactivo'], null, ['class'=>'form-control','required','placeholder' => 'Estatus de la edicion..']) !!}
			</div>
			<!--ID de Admin-->
			<div class="form-group">
				{!! Form::hidden('user_id',Auth::user()->id)!!}
			</div>
			<hr>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Crear Edicion',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
	

@stop