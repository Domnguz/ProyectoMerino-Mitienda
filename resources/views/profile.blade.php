@extends('layouts.app')

@section('contenido')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-4xl font-bold text-center mb-8">
            Mi Perfil
        </h1>

        <div class="flex justify-center mb-8">

            @if($usuario->foto)

                <img src="{{ asset('storage/'.$usuario->foto) }}"
                     class="w-40 h-40 rounded-full object-cover border-4 border-blue-500">

            @else

                <div class="w-40 h-40 rounded-full bg-gray-200 flex items-center justify-center text-5xl">
                    👤
                </div>

            @endif

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <strong>Nombre:</strong>
                <p>{{ $usuario->name }}</p>
            </div>

            <div>
                <strong>Apellidos:</strong>
                <p>{{ $usuario->apellidos }}</p>
            </div>

            <div>
                <strong>DNI:</strong>
                <p>{{ $usuario->dni }}</p>
            </div>

            <div>
                <strong>Teléfono:</strong>
                <p>{{ $usuario->telefono }}</p>
            </div>

            <div>
                <strong>Género:</strong>
                <p>{{ $usuario->genero }}</p>
            </div>

            <div>
                <strong>Correo:</strong>
                <p>{{ $usuario->email }}</p>
            </div>

        </div>

    </div>

</div>

@endsection