@extends('layouts.app')

@section('pageTitle')
  Edicion editar
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
	<div class="panel-heading">
		<h3 class="panel-title">Edicion
			<button type="button" class="btn btn-default btn-md" onclick="window.location = '{{ route('edicion.ediciones.show',['id' => $edicion->id]) }}'">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
			</button>
			<button type="button" class="btn btn-default btn-md" onclick="borrar()">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
			</button>
		</h3>
	</div>
	<div class = "panel-body">
		{!! Form::open(['route' => ['edicion.ediciones.update', $edicion->id], 'method' => 'PATCH']) !!}
		<!--Pais-->
		<div class="form-group">
			{!! Form::label('name','Pais') !!}*
			{!! Form::text('pais',$edicion->pais,['class'=>'form-control', 'placeholder' => 'Pais de la edicion', 'required']) !!}
		</div>
		<!--Fecha Inicio-->
		<div class="form-group">
			{!! Form::label('name','Fecha De Inicio') !!}*
			{!! Form::date('fechaInicio',$edicion->fechaInicio, ['class'=>'form-control','required']) !!}
		</div>
		<!--Fecha Final-->
		<div class="form-group">
			{!! Form::label('name','Fecha Final') !!}*
			{!! Form::date('fechaFinal', $edicion->fechaFinal, ['class'=>'form-control','required']) !!}
		</div>
		<!--Logo-->
		<div class="form-group">
			{!! Form::label('logo','Logo') !!}
			{!! Form::text('logo',$edicion->logo,['class'=>'form-control', 'placeholder' => 'Logo de la edicion']) !!}
		</div>
		<!--Estatus-->
		<div class="form-group">
			{!! Form::label('estatus','Estatus') !!}*
			{!! Form::select('estatus', ['pasado' => 'pasado', 'planeado' => 'planeado', 'publicado' => 'publicado'], $edicion->estatus, ['class'=>'form-control','required','placeholder' => 'Estatus de la edicion..']) !!}
		</div>
		<!--Modo-->
		<div class="form-group">
			{{$edicion->modo}}
			{!! Form::label('modo','Editar') !!} (solo se puede editar una edición)
			@if ($edicion->modo) 
				{!! Form::checkbox('modo', '1',true) !!}
			@else
				{!! Form::checkbox('modo', '1') !!}
			@endif
		</div>
		<!--ID de Admin-->
		<div class="form-group">
			{!! Form::hidden('user_id',Auth::user()->id)!!}
		</div>
		<hr>
		<!--Boton-->
		<div class="form-group">
			{!! Form::submit('Editar Edicion',['class'=>'btn btn-primary'])!!}
		</div>

		{!! Form::close() !!}
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