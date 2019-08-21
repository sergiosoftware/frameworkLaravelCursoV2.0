<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('plantilla')

    @section('titulo', 'Todos los mensajes')
        
    @section('contenido')
    <div class="container">
        <h3>Todos los mensajes</h3>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Contenido</th>
                    <th>Notas</th>
                    <th>Etiquetas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($mensajes as $mensaje)
                <tr>
                    @if ($mensaje->user_id)
                        <td>
                            <a href="{{ route('usuarios.show', $mensaje->user->id) }}"> {{-- ojo user->name --}}
                                {{ $mensaje->user->name }}
                            </a>
                        </td> 
						<td>{{ $mensaje->user->email }}</td>
					@else
						<td>{{ $mensaje->nombre }}</td> {{-- ojo mensaje->nombre --}}
						<td>{{ $mensaje->email }}</td>
                    @endif
                    
                    <td>
						<a href="{{ route('mensajes.show', $mensaje->id) }}">
							{{ $mensaje->asunto }}
						</a>
                    </td>
                    
                    <td>{{ $mensaje->contenido }}</td>
                    <td>{{ $mensaje->nota->contenido ?? '' }}</td>
                    <td>{{ $mensaje->etiquetas->pluck('nombre')->implode(', ') }}</td>
                    
                    <td>
                        <div class="btn-group" role="group">
                            <div class="col-md-6 custom">
                                <a class="btn btn-info btn-sm" href="{{ route('mensajes.edit', $mensaje->id) }}">Editar</a>    
                            </div>
                            <div class="col-md-6 custom">
                                <form method="POST" action="{{ route('mensajes.destroy', $mensaje->id) }}">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>