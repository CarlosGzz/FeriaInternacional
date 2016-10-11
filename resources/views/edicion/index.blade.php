@extends('layouts.app')

@section('pageTitle')
  Ediciones
@stop
@section('content')
	<a href="{{ route('edicion.ediciones.create')}}" class="btn btn-info">Crear Edicion</a><hr>
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Logo</th>
				<th>Estatus</th>
				<th>Creado Por</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ediciones as $edicion)
				<tr data-toggle="collapse" data-target="#accordion{{$edicion->id}}" class="clickable">
					<td><a href="{{ route('edicion.ediciones.show',['id' => $edicion->id]) }}">{{ $edicion->pais }}</a></td>
					<td>{{ $edicion->fechaInicio }}</td>
					<td>{{ $edicion->fechaFinal }}</td>
					<td>{{ $edicion->logo }}</td>
					<td>{{ $edicion->estatus }}</td>
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
	{!! $ediciones->render() !!}

@stop