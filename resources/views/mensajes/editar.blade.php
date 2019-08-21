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
        <h1>Mensaje</h1>
        {{-- <form method="post" action="{{ route('mensajes.create') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputNombre">Nombre</label>
                <input name="nombre" class="form-control" placeholder="Nombre..." 
                value="{{ $mensaje->nombre }}">
                {!! $errors->first('nombre', '<small>:message</small>') !!} 
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="correo" placeholder="Correo..."   
                value="{{ $mensaje->email }}">
                {!! $errors->first('correo', '<small>:message</small>') !!} 
            </div>
            <div class="form-group">
                <label for="exampleInputAsunto">Asunto</label>
                <input name="asunto" class="form-control" placeholder="Asunto..." 
                value="{{ $mensaje->asunto }}">
                {!! $errors->first('asunto', '<small>:message</small>') !!} 
            </div>
            <div class="form-group">
                <label for="exampleInputContenido">Contenido</label>
                <textarea name="contenido" class="form-control" placeholder="Contenido...">
                    {{ $mensaje->contenido }}
                </textarea>
                {!! $errors->first('contenido', '<small>:message</small>') !!}
            </div>
            <button class="btn btn-primary btn-lg btn-block">Enviar</button>
        </form> --}}
        <form method="post" action={{ route('mensajes.update', $mensaje->id) }}>
            {!! method_field('PUT') !!}
            @include('mensajes.form', ['btnText' => 'Actualizar'])
        </form> 

    </div>
        
    
    @endsection
    
</body>
</html>