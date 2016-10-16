@extends('layouts.app')

@section('pageTitle')
  Usuarios
@stop
@section('content')
	<a href="{{ url('/user/users/create') }}" class="btn btn-info">Crear Admin</a><hr>
	<table class="table tables-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Tipo</th>
				<th>Edicion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr data-toggle="collapse" data-target="#accordion{{$user->id}}" class="clickable">
					<td><a href="{{ route('edicion.ediciones.show',['id' => $user->id]) }}">{{ $user->name }}</a></td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->tipo }}</td>
					<td>{{ $user->edicion_id}}</td>
				</tr>
				<tr id="accordion{{$user->id}}" class="collapse">
					<td colspan="4">
						<label>Eventos:</label> {{ $user->eventos->count() }}
						<br>
						<label>Modulos:</label> {{ $user->modulos->count() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $users->render() !!}

@stop