<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo</title>
</head>
<body>
    @extends('plantilla')

    @section('titulo')
        Catálogo
    @endsection

    @section('contenido')
    <div class="container">    
        <h1>Catálogo de productos</h1>
        <a href="{{ route('catalogo') }}">Agregar producto</a>
        <ul class="navbar-nav mr-auto">            
            @isset ($productos)
                @forelse($productos as $producto)
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="{{ route('catalogo', $producto) }}">
                                {{ $producto->nombre }}</a>
                    </li>
                </ul>
                @empty
                    <li>No hay productos para mostrar</li>
                @endforelse
                    {{ $productos->links() }}
                @else
                <li>Catálogo no definido</li>
            @endisset
        </ul>
    </div>

    @endsection   
</body>
</html>