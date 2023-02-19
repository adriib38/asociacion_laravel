<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - Adrián</title>
    <link rel="stylesheet" href="/css/style.css">

</head>
    <body>
        @include('partials.navbar')
        <div id="contenido">
            @yield('contenido')
        </div>
        @include('partials.pie')
    </body>
</html>

