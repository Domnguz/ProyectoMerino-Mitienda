@extends('layouts.app')

@section('contenido')
<div class="flex items-center justify-center min-h-[60vh]">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">
            Bienvenido de nuevo
        </h2>

        <form action="/login" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Correo Electrónico
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="ejemplo@correo.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm">
                    <span class="ml-2 text-sm text-gray-600">
                        Recordarme
                    </span>
                </label>

                <a href="#" class="text-sm text-blue-600 hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-300 shadow-md">
                Iniciar Sesión
            </button>
       @if(session('error'))

<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-center">

    {{ session('error') }}

</div>

@endif
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            ¿No tienes cuenta?
            <a href="#" class="text-blue-600 hover:underline font-bold">
                Regístrate aquí
            </a>
        </p>
    </div>
</div>
@endsection