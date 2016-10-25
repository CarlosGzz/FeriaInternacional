@extends('layouts.app')

@section('pageTitle')
  Ediciones 
  <a href="{{ route('edicion.ediciones.create')}}" class="btn btn-info" style="float:right;">Crear Edicion</a>
@stop
@section('content')
<h1>Estas Editando</h1>
	<div class="panel panel-danger">
	  		<div class="panel-body">
	  			@if(empty($edicionEditando))
	  				No hay ninguna edicion en modificación
	  			@else
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		  			<h3>Pais: 
		  				<h2>
			  				<a href="{{ route('edicion.ediciones.show',['id' => $edicionEditando->id]) }}">
			  					{{ $edicionEditando->pais }}
			  				</a>
		  				</h2> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
	  				<h3>Logo: 
		  				<h4>
		  					<img src="{{ $edicionEditando->logo }}">
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
		  			<h3>Fecha Inicio: 
		  				<h4>
		  					{{ $edicionEditando->fechaInicio }}
		  				</h4> 
		  			</h3>
		  			<h3>Fecha Final: 
		  				<h4>
		  					{{ $edicionEditando->fechaFinal }}
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
	  				<h3>Eventos: 
		  				<h4>
		  					{{ $edicionEditando->eventos->count() }}
		  				</h4> 
		  			</h3>
		  			<h3>Modulos: 
		  				<h4>
		  					{{ $edicionEditando->modulos->count()}}
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
		  			<h3>Creado Por: 
		  				<h4>
		  					{{ $edicionEditando->user->name }}
		  				</h4> 
		  			</h3>
	  			</div>
	  			@endif
	  		</div>
	</div>
	<hr>
	<h1> Edicion Publicada</h1>
	<div class="panel panel-primary">
	  		<div class="panel-body">
	  			@if(empty($edicionPublicada))
	  				No hay ninguna edicion publicada
	  			@else
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		  			<h3>Pais: 
		  				<h2>
			  				<a href="{{ route('edicion.ediciones.show',['id' => $edicionPublicada->id]) }}">
			  					{{ $edicionPublicada->pais }}
			  				</a>
		  				</h2> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
	  				<h3>Logo: 
		  				<h4>
		  					<img src="{{ $edicionPublicada->logo }}">
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
		  			<h3>Fecha Inicio: 
		  				<h4>
		  					{{ $edicionPublicada->fechaInicio }}
		  				</h4> 
		  			</h3>
		  			<h3>Fecha Final: 
		  				<h4>
		  					{{ $edicionPublicada->fechaFinal }}
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
	  				<h3>Eventos: 
		  				<h4>
		  					{{ $edicionPublicada->eventos->count() }}
		  				</h4> 
		  			</h3>
		  			<h3>Modulos: 
		  				<h4>
		  					{{ $edicionPublicada->modulos->count()}}
		  				</h4> 
		  			</h3>
	  			</div>
	  			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
		  			<h3>Creado Por: 
		  				<h4>
		  					{{ $edicionPublicada->user->name }}
		  				</h4> 
		  			</h3>
	  			</div>
	  			@endif
	  		</div>
	</div>
	<hr>
	<h1> Ediciones Futuras</h1>
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Logo</th>
				<th>Estatus</th>
				<th>Modo</th>
				<th>Creado Por</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($edicionesPlaneadas as $edicion)
				<tr data-toggle="collapse" data-target="#accordion{{$edicion->id}}" class="clickable">
					<td><a href="{{ route('edicion.ediciones.show',['id' => $edicion->id]) }}">{{ $edicion->pais }}</a></td>
					<td>{{ $edicion->fechaInicio }}</td>
					<td>{{ $edicion->fechaFinal }}</td>
					<td>{{ $edicion->logo }}</td>
					<td>{{ $edicion->estatus }}</td>
					<td>
						@if($edicion->modo == 1)
							Editando
						@else
							Lectura
						@endif
					</td>
					<td>{{ $edicion->user->name }}</td>
				</tr>
				<tr id="accordion{{$edicion->id}}" class="collapse">
					<td colspan="4">
						<label>Eventos:</label> {{ $edicion->eventos->count() }}
						<br>
						<label>Modulos:</label> {{ $edicion->modulos->count() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $edicionesPlaneadas->render() !!}
	<hr>
	<h1> Ediciones Pasadas</h1>
	@if ($edicionesPasadas->count() <= 0 )
		<br>No hay ediciones pasadas</br>
	@else
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Logo</th>
				<th>Modo</th>
				<th>Creado Por</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($edicionesPasadas as $edicion)
				<tr data-toggle="collapse" data-target="#accordion{{$edicion->id}}" class="clickable">
					<td><a href="{{ route('edicion.ediciones.show',['id' => $edicion->id]) }}">{{ $edicion->pais }}</a></td>
					<td>{{ $edicion->fechaInicio }}</td>
					<td>{{ $edicion->fechaFinal }}</td>
					<td>{{ $edicion->logo }}</td>
					<td> Solo Lectura</td>
					<td>{{ $edicion->user->name }}</td>
				</tr>
				<tr id="accordion{{$edicion->id}}" class="collapse">
					<td colspan="4">
						<label>Eventos:</label> {{ $edicion->eventos->count() }}
						<br>
						<label>Modulos:</label> {{ $edicion->modulos->count() }}
					</td>
				</tr>
			@endforeach	
		</tbody>
	</table>
	{!! $edicionesPasadas->render() !!}
	@endif

@stop