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
<nav class="bg-gray-900 shadow-lg border-b border-gray-800 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-4">

        <!-- Logo -->
        <a href="/"
           class="flex items-center gap-2 text-white text-2xl font-extrabold tracking-wide hover:text-gray-200 transition duration-300">
            🛒 Mi Tienda
        </a>

        <!-- Menú -->
        <div class="flex items-center space-x-8">

            <a href="/"
               class="text-gray-300 hover:text-white font-medium transition">
                Inicio
            </a>

            <!-- Categorías -->
            <div class="relative">

                <a href="/productos"
                id="btnCategorias"
                class="text-gray-300 hover:text-white font-medium transition">
                    Productos 
                </a>

                <div id="menuCategorias"
                     class="hidden absolute top-full left-0 mt-3 w-52 bg-white rounded-lg shadow-xl z-50">

                    @foreach($categorias as $categoria)

                    <a href="/categoria/{{ $categoria->id }}"
                       class="block px-4 py-3 text-gray-700 hover:bg-gray-100">

                        {{ $categoria->nombre }}

                    </a>

                    @endforeach

                </div>

            </div>

            @if(Auth::check())

                <span class="text-white font-semibold">
                    👤 {{ Auth::user()->name }}
                </span>

                <form action="/logout" method="POST" class="inline">
                    @csrf

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition">
                        Cerrar sesión
                    </button>
                </form>

            @else

                <a href="/login"
                   class="bg-blue-600 hover:bg-blue-500 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition">
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

<script>

document.addEventListener('DOMContentLoaded', function() {

    const btn = document.getElementById('btnCategorias');
    const menu = document.getElementById('menuCategorias');

    let tiempo;

    btn.addEventListener('mouseenter', function() {

        tiempo = setTimeout(function() {

            menu.classList.remove('hidden');

        }, 500);

    });

    btn.addEventListener('mouseleave', function() {

        clearTimeout(tiempo);

    });

    menu.addEventListener('mouseenter', function() {

        menu.classList.remove('hidden');

    });

    menu.addEventListener('mouseleave', function() {

        menu.classList.add('hidden');

    });

});

</script>
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

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto agregado al carrito 🛒',
                    showConfirmButton: false,
                    timer: 1800,
                    timerProgressBar: true
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
                document
                    .getElementById('carritoModal')
                    .classList.remove('translate-x-full');

                document
                    .getElementById('overlayCarrito')
                    .classList.remove('hidden');

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
</html>