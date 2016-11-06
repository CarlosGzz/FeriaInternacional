@extends('layouts.app')

@section('pageTitle')
  Contenido Cultural
@stop
@section('content')

<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
	<div class="panel panel-info">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" style="padding-top: 7.5px;">Contenido Cultural</h2>
			<div class="btn-group pull-right">
				<a href="{{route('contenido.contenidos.edit',['id' => $modulo->id])}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
				<a onclick="borrar()" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
			</div>
		</div>
		<div class = "panel-body">
			<!--Titulo-->
			<div class="form-group">
				<label>Titulo</label>
				<p> {{$modulo->titulo}} </p>
			</div>
			<!--Tema-->
			<div class="form-group">
				<label>Tema</label>
				<p> {{$modulo->tema->nombre}} </p>
			</div>
			<!--Subtemas-->
			<div class="form-group">
				<label>Subtemas</label>
				@foreach ($modulo->subtemas as $subtema)
					<p> {{ $subtema->nombre }}</p>
				@endforeach
			</div>
			<!--Tipo-->
			<div class="form-group">
				<label>Tipo</label>
				<p> {{$modulo->tipo}} </p>
			</div>
			<!--Estatus-->
			<div class="form-group">
				<label>Estatus</label>
				<p>
					@if($modulo->estatus == 1)
					Planeado
					@elseif($modulo->estatus == 2)
					Publicado
					@endif
				</p>
			</div>
			<hr>
			<!--Contenido-->
			<h3>Contenido</h3>
			<div class="form-group">
				@foreach($modulo->contenidos as $contenido)
					<!--Linea de Texto-->
					@if($contenido->formato == 'lineaTexto')
						<div class='panel panel-info'>
							<div class='panel-heading'>
								<label class='panel-title' name='texto'>Linea de Texto</label>
							</div>
							<div class='form-group panel-body'>
								<p style="width: 100%;word-wrap: break-word;">{{$contenido->contenido}}</p>
							</div>
						</div>
					@endif
					<!--Area de Texto-->
					@if($contenido->formato == 'areaTexto')
						<div class='panel panel-info'>
							<div class='panel-heading'>
								<label class='panel-title'>Area de Texto</label>
							</div>
							<div class='form-group panel-body'>
								<p style="width: 100%;word-wrap: break-word;">{{$contenido->contenido}}</p>
							</div>
						</div>
					@endif
					<!--Imagen-->
					@if($contenido->formato == 'imagen')
						<div class='panel panel-success'>
							<div class='panel-heading'>
								<label class='panel-title'>Imagen</label>
							</div>
							<div class='form-group panel-body'>
								<img src='{{$contenido->contenido}}'>
							</div>
						</div>
					@endif
					<!--Video-->
					@if($contenido->formato == 'video')
						<div class='panel panel-success'>
							<div class='panel-heading'>
								<label class='panel-title'>Video</label>
							</div>
							<div class='form-group panel-body'>
								<img src='{{$contenido->contenido}}'>
							</div>
						</div>
					@endif
					<!--Audio-->
					@if($contenido->formato == 'audio')
					<div class='panel panel-success'>
							<div class='panel-heading'>
								<label class='panel-title'>Audio</label>
							</div>
							<div class='form-group panel-body'>
								<audio src="{{$contenido->contenido}}" controls></audio>
							</div>
						</div>
					@endif
					<!--Pagina Web-->
					@if($contenido->formato == 'paginaWeb')
					@endif

				@endforeach
				<label>Descripcion</label>
				<p> {{$modulo->descripcion}} </p>
			</div>
			<!--ID de ADMIN-->
			<hr>
			<div class="form-group">
				<label>Creado Por</label>
				<p> {{$modulo->user->name}} </p>
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
		        window.location = "{{route('contenido.contenidos.destroy', $modulo->id)}}"
		    }
		}
	</script>
@stop