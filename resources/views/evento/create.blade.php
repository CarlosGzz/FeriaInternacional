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
			 	{!! Form::label('titulo','Titulo') !!}*
			 	{!! Form::text('titulo','',['class'=>'form-control', 'placeholder' => 'Titulo del evento', 'required']) !!}
		  	</div>
		  	<!--Fecha Inicio-->
		  	<div class="form-group">
			 	{!! Form::label('fechaInicio','Fecha De Inicio') !!}*
			 	{!! Form::date('fechaInicio', \Carbon\Carbon::now(), ['class'=>'form-control','required']) !!}
		  	</div>
		  	<!--Fecha Final-->
		  	<div class="form-group">
			 	{!! Form::label('fechaFinal','Fecha Final') !!}*
			 	{!! Form::date('fechaFinal', \Carbon\Carbon::now()->addDay(), ['class'=>'form-control','required']) !!}
		  	</div>
		  	<!--Lugar-->
		  	<div class="form-group">
			 	{!! Form::label('lugar','Lugar')!!}*
			 	{!! Form::text('lugar','',['class'=>'form-control', 'placeholder' => 'Lugar del evento', 'required']) !!}
		  	</div>
		  	<!--Descripcion-->
		  	<div class="form-group">
			 	{!! Form::label('descripcion','Desrcripción') !!}
			 	{!! Form::textarea('descripcion','',['class'=>'form-control', 'placeholder' => 'Desrcripcion del evento', 'rows' => 3]) !!}
		  	</div>
		  	<!--Tema-->
		  	<div class="form-group" id="tema">
			 	{!! Form::label('tema','Tema') !!}*
			 	<button type="button" onclick="temaCambio()" class="btn btn-link" id="btnTema">nuevo tema</button>
			 	{!! Form::select('tema_id', $temasArray , '0',['class'=>'form-control', 'placeholder' => 'Tema del evento..','id'=>'tema_id']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Tema del evento','id'=>'tema_id2']);!!}
			</div>
			<!--Subtemas-->
		  	<div class="form-group" id="subtemas">
			 	{!! Form::label('subtema','Subtema') !!}
			 	<button type="button" onclick="subtemaCambio()" class="btn btn-link" id="btnSubtema">nuevos subtemas</button>
			 	{!! Form::select('subtemas[]', $subtemasArray , '0',['class'=>'form-control','id'=>'subtema','multiple'=>'true']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Subtemas del evento','id'=>'subtema2']);!!}
		  	</div>
		  	<!--Tipo-->
		  	<div class="form-group" onload="temaSelect()">
			 	{!! Form::label('tipo','Tipo') !!}*
			 	{!! Form::text('tipo','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required']) !!}
		  	</div>
		  	<hr>
		  	<!--Encargado-->
		  	<div class="form-group">
			 	{!! Form::label('encargado','Encargado') !!}
			 	{!! Form::text('encargado','',['class'=>'form-control', 'placeholder' => 'Nombre y Apellido']) !!}
		  	</div>
		  	<!--Estatus-->
		  	<div class="form-group">
			 	{!! Form::label('estatus','Estatus') !!}*
			 	{!! Form::select('estatus', ['1' => 'Planeado', '2' => 'Publicado'], null, ['class'=>'form-control','required','placeholder' => 'Estatus del evento..', 'required']) !!}
		  	</div>
		  	<!--Registo de Asistencia-->
		  	<div class="form-group">
			 	{!! Form::label('registroDeAsistencia','Se tomara Registro de Asistencia') !!}
			 	{!! Form::text('registroDeAsistencia','',['class'=>'form-control', 'placeholder' => 'Tipo de evento']) !!}
		  	</div>
		  	<!--Audiencia Interesada-->
		  	<div class="form-group">
			 	{!! Form::label('audienciaInteresada','Audiencia Interesada') !!}
			 	{!! Form::text('audienciaInteresada','',['class'=>'form-control', 'placeholder' => 'Tipo de evento']) !!}
		  	</div>
		  	<!--Comentarios-->
		  	<div class="form-group">
			 	{!! Form::label('comentarios','Comentarios') !!}
			 	{!! Form::textarea('comentarios','',['class'=>'form-control','id'=>'tema_id', 'placeholder' => 'Tipo de evento', 'rows' => 3]) !!}
		  	</div>
		  	<!--ID de ADMIN-->
		  	<div class="form-group">
			 	{!! Form::hidden('user_id',Auth::user()->id ) !!}
		  	</div>

		  	<hr>
		  	<!--Boton-->
		  	<div class="form-group">
		  		{!! Form::submit('Crear Evento',['class'=>'btn btn-primary']) !!}
		  	</div>
			{!! Form::close() !!}
		</div>
	</div>

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