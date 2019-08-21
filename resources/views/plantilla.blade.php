<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Tienda')</title>
    <link rel="stylesheet" href="/css/app.css">
    <!-- en lo posible use async o defer para hacer carga diferida -->
    <script async src="/js/app.js"></script>
    {{-- <script>
        let arr = ['Uno', 'Dos', 'Tres', 'Cuatro'];
        $.each(arr, function (index, value) {
            console.log(value);
        });
    </script> --}}
    {{-- <style>
        .activo a {
            color: red;
            text-decoration: none;
        }
    </style> --}}
</head>
<body>
    @include('partials/nav')
    @yield('contenido')
</body>
</html>