<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-4xl font-extrabold">Hola desde plantilla base</h1>
    @yield('contenido')
</body>
</html>