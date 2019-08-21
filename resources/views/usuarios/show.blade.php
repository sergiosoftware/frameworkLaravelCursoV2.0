@extends('plantilla')

@section('titulo', 'Xxxxxxx')

@section('contenido')
	<h1>{{ $usuario->name }}</h1>

    <table class="table table-stripped">
		<tr>
			<th>Nombre:</th>
			<td>{{ $usuario->name }}</td>
		</tr>
		<tr>
			<th>Email:</th>
			<td>{{ $usuario->email }}</td>
		</tr>
		<tr>
			<th>Roles:</th>
			<td>
				@foreach ($usuario->roles as $role)
					{{ $role->descripcion }}
				@endforeach
			</td>
		</tr>
    </table>
    
    <div class="btn-group" role="group">
        <div class="col-md-6 custom">
            @can('edit', $usuario)
                <a href={{ route('usuarios.edit', $usuario->id) }} class="btn btn-info">Editar</a>
            @endcan
        </div>
        <div class="col-md-6 custom">
            @can('destroy', $usuario)
                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                    @csrf
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            @endcan
        </div>
    </div>

@endsection