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
        Login
    @endsection
    
    @section('contenido')
        <div class="container">
            <br>
            <h2>Autenticación de usuarios</h2>
        
            <form class="form-inline" method="POST" action="login">
                @csrf
        
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo">
                </div>
        
                <div class="form-group mx-sm-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>
        
                <input class="btn btn-primary" type="submit" value="Ingresar">
            </form>
            <br>            
        </div>
        
    @endsection
</body>
</html>