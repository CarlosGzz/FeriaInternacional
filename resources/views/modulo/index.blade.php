@extends('layouts.app')

@section('pageTitle')
  Contenido Cultural
@stop
@section('content')
	<a href="{{ route('contenido.contenidos.create')}}" class="btn btn-info">Crear Contenido</a><hr>
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Tipo</th>
				<th>Tema</th>
				<th>Subtemas</th>
				<th>Contenido</th>
				<th>Creado Por</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($modulos as $modulo)
				<tr data-toggle="collapse" data-target="#accordion{{$modulo->id}}" class="clickable">
					<td><a href="{{route('contenido.contenidos.show',['id' => $modulo->id, 'edit_delete' => 0])}}">{{ $modulo->titulo }}</a></td>
					<td>{{ $modulo->tipo }}</td>
					<td>{{ $modulo->tema->nombre }}</td>
					<td>{{ $modulo->subtemas->count() }}</td>
					<td>{{ $modulo->contenidos->count() }}</td>
					<td>{{ $modulo->user->name }}</td>
				</tr>
				<tr id="accordion{{$modulo->id}}" class="collapse">
					<td colspan="4">
						@foreach ($modulo->subtemas as $subtema)
							<label>Subtema:</label> {{ $subtema->nombre }}
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $modulos->render() !!}

@stop