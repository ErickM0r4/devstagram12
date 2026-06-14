<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">DevStagram</h1>

            @auth
                <nav class="flex gap-3 items-center">
                    {{-- Mostrar el username del usuario autenticado --}}
                    <a class="font-bold text-gray-600 text-sm" href="#"> Hola: <span
                            class="font-normal  text-blue-600">{{ auth()->user()->username }}</span></a>

                    {{-- Enviar una petición POST para cerrar la sesión --}}
                    <form method="POST" action="{{ route('logout') }}">
                        {{-- Token CSRF obligatorio para formularios POST --}}
                        @csrf
                        {{-- Botón para cerrar la sesión actual --}}
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar Sesión
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Ingresar</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>

        {{-- Insertamos contenido dinámico  --}}
        @yield('contenido')
    </main>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
        © {{ date('Y') }} DevStagram - Todos los derechos reservados.
    </footer>
</body>

</html>
