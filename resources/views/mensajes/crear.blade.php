{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('plantilla')

    @section('titulo', 'Contacto')
    
    @section('contenido')
    <div class="container">
        <h1>Contacto</h1>

        <form method="post" action={{ route('mensajes.store') }}>
            @csrf
            @if (auth()->guest())
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="input" class="form-control" id="nombre" name="nombre" placeholder="Ingrese aquí su nombre">
                </div>
        
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese aquí su correo">
                </div>
            @endif
            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="input" class="form-control" id="asunto" name="asunto" placeholder="Motivo por el que se comunica con nosotros">
            </div>
    
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
            </div>
    
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
        
    
    @endsection
</body>
</html> --}}

@extends('plantilla')

@section('titulo', 'Contacto')

@section('contenido')
	<h1>Contacto</h1>

	<form method="post" action={{ route('mensajes.store') }}>
		{{-- crear no tiene acceso a una instancia de mensaje --}}
		@include('mensajes.form', ['mensaje' => new App\Mensaje])
	</form>

@endsection