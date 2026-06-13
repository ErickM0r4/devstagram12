@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        {{-- Imagen lateral del formulario --}}
        <div class="md:w-6/12 p-5">
            <img class="rounded-2xl" src="{{ asset('img/registrar.jpg') }}" alt="Imagen de Registro Usuarios">
        </div>

        {{-- Contenedor del formulario --}}
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form action="{{ route('register') }}" method="POST" novalidate>{{-- novalidate - sirve para que las validaciones HTML5 interfieran con las que hicimos de Laravel, normalmente los formularios van de la siguiente forma: --}}

            {{-- <form action="{{ route('register') }}" method="POST"> --}}

                @csrf
                {{-- Campo Nombre --}}
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>

                    <input id="name" name="name" type="text" placeholder="Tu nombre completo"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Campo Username --}}
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>

                    <input id="username" name="username" type="text" placeholder="Tu nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Campo Email --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input id="email" name="email" type="email" placeholder="Tu Email de Registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Campo Password --}}
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>

                    <p class="mt-2 text-sm text-gray-500 mb-2">
                        Debe tener al menos 6 caracteres, una mayúscula, una minúscula,
                        un número y un símbolo.
                    </p>

                    <input id="password" name="password" type="password" placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Confirmación de Password --}}
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>

                    <p class="mt-2 text-sm text-gray-500 mb-2">
                        Debe coincidir exactamente con la contraseña anterior.
                    </p>

                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu Password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                </div>

                {{-- Botón de envío --}}
                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

        </div>

    </div>
@endsection
