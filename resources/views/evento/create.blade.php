@extends('layouts.app')

@section('pageTitle')
  Crear Evento
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
	<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10 col-lg-offset-1 panel panel-default">
		<div class = "panel-body">
			{!! Form::open(['route' => 'evento.eventos.store', 'method' => 'POST']) !!}
			<!--Titulo-->
			<div class="form-group">
			 	{!! Form::label('titulo','Titulo')!!}
			 	{!! Form::text('titulo','',['class'=>'form-control', 'placeholder' => 'Titulo del evento', 'required'])!!}
		  	</div>
		  	<!--Fecha Inicio-->
		  	<div class="form-group">
			 	{!! Form::label('fechaInicio','Fecha De Inicio')!!}
			 	{!! Form::date('fechaInicio', \Carbon\Carbon::now(), ['class'=>'form-control','required'])!!}
		  	</div>
		  	<!--Fecha Final-->
		  	<div class="form-group">
			 	{!! Form::label('fechaFinal','Fecha Final')!!}
			 	{!! Form::date('fechaFinal', \Carbon\Carbon::now()->addDay(), ['class'=>'form-control','required'])!!}
		  	</div>
		  	<!--Lugar-->
		  	<div class="form-group">
			 	{!! Form::label('lugar','Lugar')!!}
			 	{!! Form::text('lugar','',['class'=>'form-control', 'placeholder' => 'Lugar del evento', 'required'])!!}
		  	</div>
		  	<!--Descripcion-->
		  	<div class="form-group">
			 	{!! Form::label('descripcion','Desrcripción')!!}
			 	{!! Form::text('descripcion','',['class'=>'form-control', 'placeholder' => 'Desrcripcion del evento', 'required'])!!}
		  	</div>
		  	<!--Tema-->
		  	<div class="form-group">
			 	{!! Form::label('tema','Tema')!!}
			 	{!! Form::text('tema','',['class'=>'form-control', 'placeholder' => 'Tema del evento', 'required'])!!}
		  	</div>
		  	<!--Tipo-->
		  	<div class="form-group">
			 	{!! Form::label('tipo','Tipo')!!}
			 	{!! Form::text('tipo','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<hr>
		  	<!--Encargado-->
		  	<div class="form-group">
			 	{!! Form::label('encargado','Encargado')!!}
			 	{!! Form::text('encargado','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<!--Estatus-->
		  	<div class="form-group">
			 	{!! Form::label('estatus','Estatus')!!}
			 	{!! Form::text('estatus','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<!--Registo de Asistencia-->
		  	<div class="form-group">
			 	{!! Form::label('registroDeAsistencia','Se tomara Registro de Asistencia')!!}
			 	{!! Form::text('registroDeAsistencia','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<!--Audiencia Interesada-->
		  	<div class="form-group">
			 	{!! Form::label('audienciaInteresada','Audiencia Interesada')!!}
			 	{!! Form::text('audienciaInteresada','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<!--Comentarios-->
		  	<div class="form-group">
			 	{!! Form::label('comentarios','Comentarios')!!}
			 	{!! Form::text('comentarios','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required'])!!}
		  	</div>
		  	<!--ID de ADMIN-->
		  	<div class="form-group">
			 	{!! Form::hidden('administrador_id',Auth::user()->id )!!}
		  	</div>
		  	<hr>
		  	<!--Boton-->
		  	<div class="form-group">
		  		{!! Form::submit('Crear Evento',['class'=>'btn btn-primary'])!!}
		  	</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop