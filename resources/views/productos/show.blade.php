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

    @section('titulo', "Catálogo | $producto->nombre")
    
    @section('contenido')
        <h1> {{ $producto->nombre }} </h1>
        Precio del producto $ {{ $producto->precio }}
        <br>
        Cantidad disponible: {{ $producto->cantidad_disponible }}
        <br>
        Cantidad mínima: {{ $producto->cantidad_minima }}
        <br>
        Cantidad máxima: {{ $producto->cantidad_maxima }}
        <br><br>
    @endsection
    
</body>
</html>