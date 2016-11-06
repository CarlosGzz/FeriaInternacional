@extends('layouts.app')

@section('pageTitle')
  Evento editar
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
<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
	      	<h2 class="panel-title pull-left" style="padding-top: 7.5px;">Evento</h2>
	      	<div class="btn-group pull-right">
	        	<a href="{{route('evento.eventos.show',['id' => $evento->id])}}" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
	        	</a>
	        	<a onclick="borrar()" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
	        	</a>
	      	</div>
	    </div>
		<div class = "panel-body">
			{!! Form::open(['route' => 'evento.eventos.store', 'method' => 'POST']) !!}
			<!--Titulo-->
			<div class="form-group">
			 	{!! Form::label('titulo','Titulo') !!}*
			 	{!! Form::text('titulo',$evento->titulo,['class'=>'form-control', 'placeholder' => 'Titulo del evento', 'required']) !!}
		  	</div>
		  	<!--Fecha Inicio-->
		  	<div class="form-group">
			 	{!! Form::label('fechaInicio','Fecha De Inicio') !!}*
			 	{!! Form::date('fechaInicio', $evento->fechaInicio, ['class'=>'form-control','required']) !!}
		  	</div>
		  	<!--Fecha Final-->
		  	<div class="form-group">
			 	{!! Form::label('fechaFinal','Fecha Final') !!}*
			 	{!! Form::date('fechaFinal', $evento->fechaFinal, ['class'=>'form-control','required']) !!}
		  	</div>
		  	<!--Lugar-->
		  	<div class="form-group">
			 	{!! Form::label('lugar','Lugar')!!}*
			 	{!! Form::text('lugar',$evento->lugar,['class'=>'form-control', 'placeholder' => 'Lugar del evento', 'required']) !!}
		  	</div>
		  	<!--Descripcion-->
		  	<div class="form-group">
			 	{!! Form::label('descripcion','Desrcripción') !!}
			 	{!! Form::textarea('descripcion',$evento->descripcion,['class'=>'form-control', 'placeholder' => 'Desrcripcion del evento', 'rows' => 3]) !!}
		  	</div>
		  	<!--Tema-->
		  	<div class="form-group" id="tema">
			 	{!! Form::label('tema','Tema') !!}*
			 	<button type="button" onclick="temaCambio()" class="btn btn-link" id="btnTema">nuevo tema</button>
			 	{!! Form::select('tema_id', $temasArray , $evento->tema->id,['class'=>'form-control', 'placeholder' => 'Tema del evento..','id'=>'tema_id']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Tema del evento','id'=>'tema_id2']);!!}
			</div>
			<?php $subtemas = array(); ?>
			{{-- */$subtemas = array();/* --}}
			@foreach ($evento->subtemas as $subtema)
				{{-- */array_push($subtemas,$subtema->id);/* --}}
			@endforeach
			<!--Subtemas-->
		  	<div class="form-group" id="subtemas">
			 	{!! Form::label('subtema','Subtema') !!}
			 	<button type="button" onclick="subtemaCambio()" class="btn btn-link" id="btnSubtema">nuevos subtemas</button>
			 	{!! Form::select('subtemas[]', $subtemasArray ,$subtemas,['class'=>'form-control','id'=>'subtema','multiple'=>'true']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Subtemas del evento','id'=>'subtema2']);!!}
		  	</div>
		  	<!--Tipo-->
		  	<div class="form-group" onload="temaSelect()">
			 	{!! Form::label('tipo','Tipo') !!}*
			 	{!! Form::text('tipo',$evento->tipo,['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required']) !!}
		  	</div>
		  	<hr>
		  	<!--Encargado-->
		  	<div class="form-group">
			 	{!! Form::label('encargado','Encargado') !!}
			 	{!! Form::text('encargado',$evento->encargado,['class'=>'form-control', 'placeholder' => 'Nombre y Apellido']) !!}
		  	</div>
		  	<!--Estatus-->
		  	<div class="form-group">
			 	{!! Form::label('estatus','Estatus') !!}*
			 	{!! Form::select('estatus', ['1' => 'Planeado', '2' => 'Publicado'], $evento->estatus, ['class'=>'form-control','required','placeholder' => 'Estatus del evento..', 'required']) !!}
		  	</div>
		  	<!--Registo de Asistencia-->
		  	<div class="form-group">
			 	{!! Form::label('registroDeAsistencia','Se tomara Registro de Asistencia') !!}
			 	{!! Form::text('registroDeAsistencia',$evento->registroDeAsistencia,['class'=>'form-control', 'placeholder' => 'Tipo de evento']) !!}
		  	</div>
		  	<!--Audiencia Interesada-->
		  	<div class="form-group">
			 	{!! Form::label('audienciaInteresada','Audiencia Interesada') !!}
			 	{!! Form::text('audienciaInteresada',$evento->audienciaInteresada,['class'=>'form-control', 'placeholder' => 'Tipo de evento']) !!}
		  	</div>
		  	<!--Comentarios-->
		  	<div class="form-group">
			 	{!! Form::label('comentarios','Comentarios') !!}
			 	{!! Form::textarea('comentarios',$evento->comentarios,['class'=>'form-control','id'=>'tema_id', 'placeholder' => 'Tipo de evento', 'rows' => 3]) !!}
		  	</div>
		  	<!--ID de ADMIN-->
		  	<div class="form-group">
			 	{!! Form::hidden('user_id','0') !!}
		  	</div>

		  	<hr>
		  	<!--Boton-->
		  	<div class="form-group">
		  		{!! Form::submit('Crear Evento',['class'=>'btn btn-primary']) !!}
		  	</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
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
@section('scripts')
	<!-- Select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
		$("#tema_id").select2();
		$("#subtema").select2();
	</script>

	<script type="text/javascript">
		function temaCambio(){

			var type2 = $("#tema_id2").attr('type');

			if(type2 == "hidden"){
				$("#tema_id").select2("destroy");
				$("#tema_id").hide();
				$("#tema_id2").prop('type', 'text');
				$("#tema_id").attr('name','');
				$("#tema_id2").attr('name','tema_id');
				$("#btnTema").html("temas");
			}else{
				if(type2 == "text"){
					$("#tema_id2").prop('type', 'hidden');
					$("#tema_id").show();
					$("#tema_id2").attr('name','');
					$("#tema_id").attr('name','tema_id');
					$("#tema_id").select2();
					$("#btnTema").html("nuevos temas");
				}
			}

		}
		function subtemaCambio(){
			var type = $("#subtema2").attr('type');
			if(type == "hidden"){
				$("#subtema").select2("destroy");
				$("#subtema").hide();
				$("#subtema2").prop('type', 'text');
				$("#subtema").attr('name','');
				$("#subtema2").attr('name','subtemas');
				$("#btnSubtema").html("subtemas");
				$("<p class='help-block' id='subtemaHelp'>Separar los nuevos subtemas utilizando comas(ej. musica,arte,etc)</p>").insertAfter("#subtema2");
			}else{
				if(type == "text"){
					$("#subtema2").prop('type', 'hidden');
					$("#subtema").show();
					$("#subtema2").attr('name','');
					$("#subtema").attr('name','subtemas[]');
					$("#subtema").select2();
					$("#btnSubtema").html("nuevos subtemas");
					$( "p" ).remove();
				}
			}
		}
	</script>
@stop