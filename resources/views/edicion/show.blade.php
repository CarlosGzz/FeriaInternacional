@extends('layouts.app')

@section('pageTitle')
  Edicion
@stop
@section('content')
<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10 panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edicion
			<button type="button" class="btn btn-default btn-md" onclick="window.location = '{{ route('edicion.ediciones.edit',['id' => $edicion->id]) }}'">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
			</button>
			<button type="button" class="btn btn-default btn-md" onclick="borrar()">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
			</button>
		</h3>
	</div>
	<div class = "panel-body">
		<!--Pais-->
		<div class="form-group">
			<label>Pais</label>
			<p> {{$edicion->pais}} </p>
		</div>
		<!--Fecha Inicio-->
		<div class="form-group">
			<label>Fecha De Inicio</label>
			<p> {{$edicion->fechaInicio}} </p>
		</div>
		<!--Fecha Final-->
		<div class="form-group">
			<label>Fecha De Final</label>
			<p> {{$edicion->fechaFinal}} </p>
		</div>
		<!--Fecha Final-->
		<div class="form-group">
			<label>Logo</label>
			<img src="{{$edicion->logo}}">
		</div>
		<!--Fecha Final-->
		<div class="form-group">
			<label>Estatus</label>
			<p> {{$edicion->estatus}} </p>
		</div>
		<!--Fecha Final-->
		<div class="form-group">
			<label>Modo</label>
			<p> 
				@if($edicion->modo == 1)
					Editando
				@else
					Lectura
				@endif</p>
		</div>

		<!--ID Admin-->
		<div class="form-group">
			<label>Creado Por</label>
			<p> {{$edicion->user->name}} </p>
		</div>

	</div>
</div>
<script>
	function borrar() {
	    var txt;
	    var r = confirm('Confirmar eliminacion de edicion');
	    if (r == true) {
	        window.location = "{{ route('edicion.ediciones.destroy', $edicion->id) }}"
	    }
	}
</script>
@stop