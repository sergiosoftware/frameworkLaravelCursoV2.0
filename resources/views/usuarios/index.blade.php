{{-- @extends('plantilla')
@section('titulo', 'Todos los usuarios')
@section('contenido')
<div class="container">
    <br>
	<h3>Todos los usuarios</h3>
    <table class="table table-striped">
        <thead>
            name
            email
            role
            address
            phone
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>        
        {{-- <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->role->nombre}}</td>
                    <td>{{ $usuario->address}}</td>
                    <td>{{ $usuario->phone}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody> --}}
        {{-- <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>
						@foreach ($usuario->roles as $role)
                            {{ $role->nombre }} : {{ $role->descripcion }} <br>
                        @endforeach
					</td>
                    <td>{{ $usuario->address}}</td>
                    <td>{{ $usuario->phone}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <div class="col-md-6 custom">
                                <a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}">  
                                    Editar
                                </a>    
                            </div>                
                            <div class="col-md-6 custom">
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>                
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}} 
@extends('plantilla')

@section('titulo', 'Todos los usuarios')

@section('contenido')
<div class="container">
    <br>
	<h3>Todos los usuarios</h3>
    <a class="btn btn-primary btn-sm float-right" 
        href="{{ route('usuarios.create') }}"
    >Crear nuevo usuario</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>
                        {{--
						@foreach ($usuario->roles as $role)
                            {{ $role->nombre }}: {{ $role->descripcion }} <br>
                        @endforeach
                        --}}
                        {{ $usuario->roles->pluck('nombre')->implode(' - ') }}
                    </td>
                    
                    <td>{{ $usuario->address}}</td>
                    <td>{{ $usuario->phone}}</td>
                    <td>{{ $usuario->nota->contenido ?? '' }}</td>
                    <td>{{ $usuario->etiquetas->pluck('nombre')->implode(', ') }}</td>

                    <td>
                        <div class="btn-group" role="group">
                            <div class="col-md-6 custom">
                                <a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>    
                            </div>

                            <div class="col-md-6 custom">
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
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