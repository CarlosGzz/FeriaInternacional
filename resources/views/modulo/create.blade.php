@extends('layouts.app')

@section('pageTitle')
  Crear Modulo de Contenido Cultural
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
			{!! Form::open(['route' => 'contenido.contenidos.store', 'method' => 'POST' , 'class'=>'form-vertical']) !!}
			<!--Titulo-->
			<div class="form-group">
			 	{!! Form::label('titulo','Titulo') !!}*
			 	{!! Form::text('titulo','',['class'=>'form-control', 'placeholder' => 'Titulo del contenido cultural', 'required']) !!}
		  	</div>
		  	<!--Tema-->
		  	<div class="form-group" id="tema">
			 	{!! Form::label('tema','Tema') !!}*
			 	<button type="button" onclick="temaCambio()" class="btn btn-link" id="btnTema">nuevo tema</button>
			 	{!! Form::select('tema_id', $temasArray , '0',['class'=>'form-control', 'placeholder' => 'Tema del contenido..','id'=>'tema_id']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Tema del evento','id'=>'tema_id2']);!!}
			</div>
			<!--Subtemas-->
		  	<div class="form-group" id="subtemas">
			 	{!! Form::label('subtema','Subtema') !!}
			 	<button type="button" onclick="subtemaCambio()" class="btn btn-link" id="btnSubtema">nuevos subtemas</button>
			 	{!! Form::select('subtemas[]', $subtemasArray , '0',['class'=>'form-control','id'=>'subtema','multiple'=>'true']);!!}
			 	{!! Form::hidden('','',['class'=>'form-control', 'placeholder' => 'Subtemas del contenido cultural','id'=>'subtema2']);!!}
		  	</div>
		  	<!--Tipo-->
		  	<div class="form-group">
			 	{!! Form::label('tipo','Tipo') !!}*
			 	{!! Form::text('tipo','',['class'=>'form-control', 'placeholder' => 'Tipo de evento', 'required']) !!}
		  	</div>
		  	<hr>
		  	<!--Contenido-->
		  	<h3>Contenido</h3>
		  	<!-- Single button -->
			<div class="btn-group">
			  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Añadir Contenido Cultural Por Formato <span class="caret"></span>
			  	</button>
			  	<ul class="dropdown-menu">
				    <li><a onclick="agregarLineaDeTexto()">Linea de Texto</a></li>
				    <li><a onclick="agregarAreaDeTexto()">Parrafo</a></li>
				    <li role="separator" class="divider"></li>
				    <li><a onclick="agregarImagen()">Imagen</a></li>
				    <li><a onclick="agregarVideo()">Video</a></li>
				    <li><a onclick="agregarAudio()">Audio</a></li>
				    <li role="separator" class="divider"></li>
				    <li><a onclick="agregarPaginaWeb()">Pagina Web</a></li>
				    <li><a onclick="agregarTrivia4()">Trivia</a></li>
			  	</ul>
			</div>
			<div id="contenido">
				<br>
				<ul id="sortable">
					
				</ul>
			</div>
		  	<hr>
		  	<!--Estatus-->
		  	<div class="form-group">
			 	{!! Form::label('estatus','Estatus') !!}*
			 	{!! Form::select('estatus', ['1' => 'Planeado', '2' => 'Publicado'], null, ['class'=>'form-control','required','placeholder' => 'Estatus del evento..', 'required']) !!}
		  	</div>
		  	<!--ID de ADMIN-->
		  	<div class="form-group">
			 	{!! Form::hidden('administrador_id',Auth::user()->id ) !!}
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
	<!-- Draggable -->
	<script>
	  $( function() {
	    $( "#sortable" ).sortable({
	      	placeholder: "ui-state-highlight",
	      	start : function(event, ui) {
	                        var start_pos = ui.item.index();
	                        ui.item.data('start_pos', start_pos);
	                    },
	  		update: function(event,ui){
	  			var index = ui.item.index();
	  			var start_pos = ui.item.data('start_pos');
			    
			    //update the html of the moved item to the current index
			    $('#sortable li:nth-child(' + (index + 1 ) + ')').attr('id',('xContenido'+index));

			    if (start_pos < index) {
			        //update the items before the re-ordered item
			        for(var i=index; i > 0; i--){
			            $('#sortable li:nth-child(' + i + ')').attr('id',('xContenido'+(i-1)))
			        }
			    }else {
			        //update the items after the re-ordered item
			        for(var i=index+2;i <= $("#sortable li").length; i++){
			            $('#sortable li:nth-child(' + i + ')').attr('id',('xContenido'+(i-1)));
			        }
			    }
			   
	  		}
	    });
	    $( "#sortable" ).disableSelection();
	  } );
	</script>
	<!--Sortable Appender-->
	<script type="text/javascript">
		$contadorDeContenido = 0;
		function agregarLineaDeTexto(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-info'><div class='panel-heading'><label class='panel-title' name='texto'>Linea de Texto</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><input name='contenido[][lineaTexto]' class='form-control' placeholder='Linea de texto' maxlength='150' required></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarAreaDeTexto(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-info'><div class='panel-heading'><label class='panel-title' name='texto'>Area de Texto</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><textarea name='contenido[][areaTexto]' class='form-control' placeholder='Parrafo de texto' required></textarea></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarImagen(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-success'><div class='panel-heading'><label class='panel-title' name='texto'>Imagen</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><input id='contenido"+$contadorDeContenido+"' name='contenido[][imagen]' class='form-control' placeholder='URL de Imagen' onchange='imagenChange(this);' required><img id='contenido"+$contadorDeContenido+"src' src=''></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarVideo(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-success'><div class='panel-heading'><label class='panel-title' name='texto'>Video</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><input id='contenido"+$contadorDeContenido+"' name='contenido[][video]' class='form-control' placeholder='URL de Video' onchange='imagenChange(this);'  required></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarAudio(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-success'><div class='panel-heading'><label class='panel-title' name='texto'>Audio</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><input id='contenido"+$contadorDeContenido+"' type='file' name='contenido[][audio]'placeholder='Archivo de Audio' accept='audio/*' onchange='playFile(this)' required><audio id='contenido"+$contadorDeContenido+"audio' controls></audio></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarPaginaWeb(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-warning'><div class='panel-heading'><label class='panel-title' name='texto'>Pagina Web</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><input id='contenido"+$contadorDeContenido+"' name='contenido[][paginaWeb]' class='form-control' placeholder='Linea de texto' maxlength='500' onchange='imagenChange(this);' required><iframe id='contenido"+$contadorDeContenido+"src' style='width:100%;'src=''></iframe></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function agregarTrivia4(){
			$stringTexto = "<li id='xContenido"+$contadorDeContenido+"'><span style='cursor:move'><div class='panel panel-warning'><div class='panel-heading'><label class='panel-title' name='texto'>Trivia 4 Respuestas</label><button type='button' class='btn btn-danger btn-xs' style='float:right;' onclick='eliminarContenido(xContenido"+$contadorDeContenido+")'>Eliminar<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div><div class='form-group panel-body'><label>Pregunta</label><input id='contenido"+$contadorDeContenido+"' name='trivia[][trivia4]' class='form-control' placeholder='Escribe la pregunta' maxlength='200' onchange='imagenChange(this);' required><label>Respuestas</label><br><div class='input-group'><label class='radio-inline'><input type='radio' name='respuesta' value='1' checked required><input id='contenido"+$contadorDeContenido+"' name='trivia[]' class='form-control'placeholder='Respuesta 1' maxlength='200'required></label></div><div class='input-group'><label class='radio-inline'><input type='radio' name='respuesta' value='2' required><input id='contenido"+$contadorDeContenido+"' name='trivia[]'class='form-control'placeholder='Respuesta 2' maxlength='200'required></label></div><div class='input-group'><label class='radio-inline'><input type='radio' name='respuesta' value='3' required><input id='contenido"+$contadorDeContenido+"' name='trivia[]' class='form-control'placeholder='Respuesta 3' maxlength='200'required></label></div><div class='input-group'><label class='radio-inline'><input type='radio' name='respuesta' value='4' required><input id='contenido"+$contadorDeContenido+"' name='trivia[]' class='form-control'placeholder='Respuesta 4' maxlength='200'required></label></div></div></div></span></li>" ;
			$("#sortable").append($stringTexto);
			$contadorDeContenido++;
		}
		function eliminarContenido(url){
			$(url).remove();
		}
	</script>
	<!--ImageChange-->
	<script type="text/javascript">
		function imagenChange(url){
			$("#"+url.id+"src").attr('src',url.value);
		}
	</script>
	<!--AudioPlayer-->
	<script type="text/javascript">
		function playFile(obj) {
			var string = String(obj.id)+"audio";
			var sound = document.getElementById(string);
			var reader = new FileReader();
			reader.onload = (function(audio){
				return function(e) {
					audio.src = e.target.result;
				};
			})(sound);
			reader.addEventListener('load','');
	        reader.readAsDataURL(obj.files[0]);
	    }
	</script>
@stop