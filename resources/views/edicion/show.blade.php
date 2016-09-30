@extends('layouts.app')

@section('pageTitle')
  Ediciones
@stop
@section('content')
	@if($edit_delete == 0)
		<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10 panel panel-default">
			<div class="panel-heading">
    			<h3 class="panel-title">Edicion
					<button type="button" class="btn btn-default btn-md" onclick="window.location = '{{route('edicion.ediciones.show',['id' => $edicion->id, 'edit_delete' => 1])}}'">
				  		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
					</button>
					<button type="button" class="btn btn-default btn-md" onclick="borrar()">
				  		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
					</button>
				</h3>
			</div>
			<div class = "panel-body">
				<div class="form-group">
					<label>Pais</label>
				 	<p> {{$edicion->pais}} </p>
			  	</div>

			  	<div class="form-group">
			  		<label>Fecha De Inicio</label>
				 	<p> {{$edicion->fechaInicio}} </p>
			  	</div>

			  	<div class="form-group">
			  		<label>Fecha De Final</label>
				 	<p> {{$edicion->fechaFinal}} </p>
			  	</div>

			  	<div class="form-group">
			  		<label>Creado Por</label>
				 	<p> {{$edicion->administrador_id}} </p>
			  	</div>

			</div>
		</div>
	@else
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
				{!! Form::open(['route' => 'edicion.ediciones.store', 'method' => 'POST']) !!}
				<div class="form-group">
				 	{!! Form::label('name','Pais')!!}
				 	{!! Form::text('pais','',['class'=>'form-control', 'placeholder' => 'Pais de la edicion', 'required'])!!}
			  	</div>

			  	<div class="form-group">
				 	{!! Form::label('name','Fecha De Inicio')!!}
				 	{!! Form::date('fechaInicio', \Carbon\Carbon::now(), ['class'=>'form-control','required'])!!}
			  	</div>

			  	<div class="form-group">
				 	{!! Form::label('name','Fecha Final')!!}
				 	{!! Form::date('fechaFinal', \Carbon\Carbon::now()->addMonths(6), ['class'=>'form-control','required'])!!}
			  	</div>

			  	<div class="form-group">
				 	{!! Form::hidden('administrador_id','1')!!}
			  	</div>

			  	<div class="form-group">
			  		{!! Form::submit('Crear Edicion',['class'=>'btn btn-primary'])!!}
			  	</div>

				{!! Form::close() !!}
			</div>
		</div>
	@endif
	<script>
		function borrar() {
		    var txt;
		    var r = confirm('Confirmar eliminacion de edicion');
		    if (r == true) {
		        window.location = "{{route('edicion.ediciones.destroy', $edicion->id)}}"
		    }
		}
	</script>
@stop