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
    <h1>Catálogo de productos</h1>

    <ul>
        
        @isset ($productos)
            @forelse($productos as $producto)
                <li>
                    <a href="{{ route('producto.show', $producto->id) }}">
                             {{ $producto->nombre }}</a>
                </li>
            @empty
                <li>No hay productos para mostrar</li>
            @endforelse
                {{ $productos->links() }}
            @else
            <li>Catálogo no definido</li>
        @endisset

    </ul>

    @endsection   
</body>
</html>