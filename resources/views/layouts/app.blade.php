<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    <title>Mi Tienda</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Categoria;

    $categorias = Categoria::all();
@endphp

<!-- Navbar -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-3">

        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 group">
            <div class="bg-blue-600 text-white w-9 h-9 rounded-lg flex items-center justify-center text-lg group-hover:bg-blue-700 transition duration-200">
                🛒
            </div>
            <span class="text-gray-900 text-xl font-bold tracking-tight">Mi Tienda</span>
        </a>

        <!-- Menú -->
        <div class="flex items-center gap-6">

            <a href="/" class="text-sm text-gray-500 hover:text-blue-600 font-medium transition duration-200">
                Inicio
            </a>

            <a href="/productos" class="text-sm text-gray-500 hover:text-blue-600 font-medium transition duration-200">
                Productos
            </a>

            <!-- Dropdown Categorías -->
            <div class="relative" id="wrapperCat">
                <button id="btnDropCat"
                    class="flex items-center gap-1 text-sm text-gray-500 hover:text-blue-600 font-medium transition duration-200">
                    Categorías
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div id="menuCategorias"
                     class="hidden absolute top-full left-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-lg z-50 py-1">
                    @foreach($categorias as $categoria)
                        <a href="/categoria/{{ $categoria->id }}"
                           class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                            {{ $categoria->nombre }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Separador -->
            <div class="w-px h-5 bg-gray-200"></div>

           @if(Auth::check())
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 px-3 py-1.5 rounded-lg">
                        <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <a href="{{ route('profile') }}"
                        class="text-sm text-gray-700 font-medium hover:text-blue-600">
                            {{ Auth::user()->name }}
                        </a>
                    </div>

                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-sm text-gray-400 hover:text-red-500 font-medium transition duration-200">
                            Salir
                        </button>
                    </form>
                </div>

            @else
                {{-- Esto es lo que te faltaba --}}
                <a href="/login"
                class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded-lg transition duration-200">
                    Login
                </a>
            @endif

        </div>
    </div>
</nav>

<!-- Contenido -->
<main class="w-full flex-grow">
    @yield('banner')
    <div class="max-w-7xl mx-auto py-10 px-6">
        @yield('contenido')
    </div>
</main>

<!-- Carrito flotante -->
<div class="fixed bottom-8 right-8 z-[60]">
    <button id="abrirCarrito"
        class="relative w-16 h-16 bg-blue-600 hover:bg-blue-700 rounded-full shadow-2xl flex items-center justify-center text-white text-3xl">
        🛒
        <span id="contadorCarrito"
            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
            {{ collect(session('carrito', []))->sum('cantidad') }}
        </span>
    </button>
</div>

<!-- Panel lateral del carrito -->
<div id="overlayCarrito"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden">
</div>
<div id="carritoModal"
 class="fixed top-0 right-0 h-full w-[400px]
 bg-white/70
 backdrop-blur-xl
 border-l border-white/30
 shadow-[0_0_40px_rgba(0,0,0,0.25)]
 z-50
 transform translate-x-full
 transition-all duration-500
 overflow-y-auto">

    <div class="flex justify-between items-center p-5 border-b border-white/30">
        <h2 class="text-xl font-bold text-gray-800">
            🛒 Mi Carrito
        </h2>
        <button id="cerrarCarrito"
                class="text-2xl font-bold text-gray-700 hover:text-red-500 transition duration-300 hover:rotate-90">
            ×
        </button>
    </div>

    <div id="contenidoCarrito" class="p-5">
        @include('partials.carrito-contenido')
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-6 mt-10">
    <p>© 2026 Mi Tienda. Todos los derechos reservados.</p>
</footer>

<!-- Script dropdown categorías -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('menuCategorias');

    // Abrir/cerrar al hacer click en el botón
    document.getElementById('btnDropCat').addEventListener('click', function(e) {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    // Cerrar al hacer click fuera
    document.addEventListener('click', function() {
        menu.classList.add('hidden');
    });

    // Evitar que clicks dentro del menú lo cierren
    menu.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});
</script>

<!-- Script carrito -->
<script>
const abrirCarrito = document.getElementById('abrirCarrito');
const cerrarCarrito = document.getElementById('cerrarCarrito');
const carritoModal = document.getElementById('carritoModal');
const overlayCarrito = document.getElementById('overlayCarrito');

abrirCarrito.addEventListener('click', () => {
    carritoModal.classList.remove('translate-x-full');
    overlayCarrito.classList.remove('hidden');
});

cerrarCarrito.addEventListener('click', () => {
    carritoModal.classList.add('translate-x-full');
    overlayCarrito.classList.add('hidden');
});

overlayCarrito.addEventListener('click', () => {
    carritoModal.classList.add('translate-x-full');
    overlayCarrito.classList.add('hidden');
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script agregar al carrito -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.form-agregar-carrito').forEach(form => {

        form.addEventListener('submit', async function(e) {

            e.preventDefault();

            const id = this.getAttribute('data-id');

            const response = await fetch(`/carrito/agregar/${id}`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': this.querySelector('[name=_token]').value
                }
            });

            const data = await response.json();

            if (data.success) {

                // Notificacion cuando le doy a comprar
                Swal.fire({
                    toast: true,
                    position: 'top-start',
                    icon: 'success',
                    title: 'Producto agregado al carrito',
                    showConfirmButton: false,
                    timer: 2800,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.style.marginTop = '70px';
                    }
                });

                const contador = document.getElementById('contadorCarrito');

                if (contador) {
                    contador.innerText = data.cantidad;
                    contador.classList.add('scale-125');
                    setTimeout(() => {
                        contador.classList.remove('scale-125');
                    }, 300);
                }

                // Abrir carrito
                document.getElementById('carritoModal').classList.remove('translate-x-full');
                document.getElementById('overlayCarrito').classList.remove('hidden');

                // Actualizar contenido del carrito
                fetch('/carrito/contenido')
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('contenidoCarrito').innerHTML = html;
                    });
            }

        });

    });

});
</script>

</body>
@if(session('success'))

<script>
Swal.fire({
    icon: 'success',
    title: 'Pedido realizado',
    text: '{{ session("success") }}',
    confirmButtonColor: '#2563eb'
});
</script>

@endif
</html>