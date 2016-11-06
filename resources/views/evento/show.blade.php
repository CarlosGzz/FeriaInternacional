@extends('layouts.app')

@section('pageTitle')
  Evento
@stop
@section('content')

<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
	<div class="panel panel-info">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" style="padding-top: 7.5px;">Evento</h2>
			<div class="btn-group pull-right">
				<a href="{{route('evento.eventos.edit',['id' => $evento->id])}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
				<a onclick="borrar()" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
			</div>
		</div>
		<div class = "panel-body">
			<!--Titulo-->
			<div class="form-group">
				<label>Titulo</label>
				<p> {{$evento->titulo}} </p>
			</div>
			<!--Fecha Inicio-->
			<div class="form-group">
				<label>Fecha De Inicio</label>
				<p> {{$evento->fechaInicio}} </p>
			</div>
			<!--Fecha Final-->
			<div class="form-group">
				<label>Fecha De Final</label>
				<p> {{$evento->fechaFinal}} </p>
			</div>
			<!--Lugar-->
			<div class="form-group">
				<label>Lugar</label>
				<p> {{$evento->lugar}} </p>
			</div>
			<!--Descripcion-->
			<div class="form-group">
				<label>Descripcion</label>
				<p> {{$evento->descripcion}} </p>
			</div>
			<!--Tema-->
			<div class="form-group">
				<label>Tema</label>
				<p> {{$evento->tema->nombre}} </p>
			</div>
			<!--Subtemas-->
			<div class="form-group">
				<label>Subtemas</label>
				@foreach ($evento->subtemas as $subtema)
					<p> {{ $subtema->nombre }}</p>
				@endforeach
			</div>
			<!--Tipo-->
			<div class="form-group">
				<label>Tipo</label>
				<p> {{$evento->tipo}} </p>
			</div>
			<hr>
			<!--Encargado-->
			<div class="form-group">
				<label>Encargado</label>
				<p> {{$evento->encargado}} </p>
			</div>
			<!--Estatus-->
			<div class="form-group">
				<label>Estatus</label>
				<p>
					@if($evento->estatus == 1)
					Planeado
					@elseif($evento->estatus == 2)
					Publicado
					@endif
				</p>
			</div>
			<!--Registo de Asistencia-->
			<div class="form-group">
				<label>Registro de Asistencia</label>
				<p> {{$evento->registroDeAsistencia}} </p>
			</div>
			<!--Audiencia Interesada-->
			<div class="form-group">
				<label>Audiencia Interesada</label>
				<p> {{$evento->audienciaInteresada}} </p>
			</div>
			<!--Comentarios-->
			<div class="form-group">
				<label>Comentarios</label>
				<p> {{$evento->comentarios}} </p>
			</div>
			<!--ID de ADMIN-->
			<hr>
			<div class="form-group">
				<label>Creado Por</label>
				<p> {{$evento->user->name}} </p>
			</div>

		</div>
	</div>
</div>
@stop
@section('scripts')
	<script>
		function borrar() {
		    var txt;
		    var r = confirm('Confirmar eliminacion de evento');
		    if (r == true) {
		        window.location = "{{route('evento.eventos.destroy', $evento->id)}}"
		    }
		}
	</script>
@stop