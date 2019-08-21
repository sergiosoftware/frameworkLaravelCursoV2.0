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
    @section('titulo', 'Mensaje')
    @section('contenido')
    <div class="container">
        <h1>Mensajes</h1>
        <p> Enviado por {{ $mensaje->nombre }} - 
                        {{ $mensaje->email }}</p>
        <p> {{ $mensaje->contenido }} </p>
    </div>
    @endsection  
</body>
</html>