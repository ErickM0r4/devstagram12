@extends('layouts.app')

{{-- Título que se mostrará en la cabecera de la página --}}
@section('titulo')
    Perfil: <span class="text-blue-700 text-3xl font-bold">{{ $user->username }}</span>
@endsection

@section('contenido')

    {{-- Contenedor principal centrado del perfil --}}
    <div class="flex justify-center">

        {{-- 
            Layout responsive del perfil.
            En móviles se muestra en columna y en pantallas medianas/grandes en fila.
        --}}
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            {{-- Imagen de perfil temporal del usuario --}}
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario">
            </div>

            {{-- Información pública del perfil --}}
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md_items-start py-10 md:py-10">

                {{-- Username del usuario obtenido mediante Route Model Binding --}}
                <p class="text-gray-700 text-2xl mb-5">
                    {{ $user->username }}
                </p>

                {{-- Número de seguidores (pendiente de implementar) --}}
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>

                {{-- Número de usuarios seguidos (pendiente de implementar) --}}
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>

                {{-- Cantidad de publicaciones del usuario (pendiente de implementar) --}}
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>

            </div>

        </div>

    </div>

@endsection