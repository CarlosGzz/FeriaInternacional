@extends('layouts.app')

@section('pageTitle')
  Eventos
@stop
@section('content')
	<a href="{{ route('evento.eventos.create')}}" class="btn btn-info">Crear Evento</a><hr>
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Lugar</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Tema</th>
				<th>Subtemas</th>
				<th>Encargado</th>
				<th>Estatus</th>
				<th>Asistencia</th>
				<th>Creado Por</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($eventos as $evento)
				<tr data-toggle="collapse" data-target="#accordion{{$evento->id}}" class="clickable">
					<td><a href="{{route('evento.eventos.show',['id' => $evento->id, 'edit_delete' => 0])}}">{{ $evento->titulo }}</a></td>
					<td>{{ $evento->fechaInicio }}</td>
					<td>{{ $evento->fechaFinal }}</td>
					<td>{{ $evento->lugar }}</td>
					<td>{{ $evento->descripcion }}</td>
					<td>{{ $evento->tipo }}</td>
					<td>{{ $evento->tema->nombre }}</td>
					<td>{{ $evento->subtemas->count() }}</td>
					<td>{{ $evento->encargado }}</td>
					<td>{{ $evento->estatus }}</td>
					<td>{{ $evento->asistencia }}</td>
					<td>{{ $evento->user->name }}</td>
				</tr>
				<tr id="accordion{{$evento->id}}" class="collapse">
					<td colspan="4">
						@foreach ($evento->subtemas as $subtema)
							<label>Subtema:</label> {{ $subtema->nombre }}
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $eventos->render() !!}

@stop