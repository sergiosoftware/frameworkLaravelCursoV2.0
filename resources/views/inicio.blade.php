<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('plantilla')

    @section('titulo')
        Tienda Online
    @endsection

    @section('contenido')
    <div class="container">    
        <h1>Página de inicio</h1>
        Bienvenid@ {{ $nombre ?? 'Invitado' }}
    </div>
    @endsection
</body>
</html>