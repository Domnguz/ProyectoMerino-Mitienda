@extends('layouts.app')

@section('banner')
<div class="max-w-7xl mx-auto px-4 sm:px-6 pt-6">
    <div class="relative overflow-hidden rounded-3xl bg-gray-900">
        <img src="{{ asset('img/banner.jpg') }}" alt="Banner" 
             class="w-full h-[500px] object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        <a href="/productos" class="absolute left-8 bottom-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
            Ver Colección
        </a>
    </div>
</div>
@endsection

@section('contenido')

{{-- Redes sociales --}}
<div class="hidden md:flex fixed left-4 top-9/10 -translate-y-1/2 z-50 flex-col gap-3 bg-black/10 backdrop-blur-md p-4 rounded-2xl border border-gray-100 shadow-md">
  <a href="#" title="Instagram"
     class="group flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 transition-all duration-300">
    <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
      <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
    </svg>
  </a>
  <a href="#" title="Facebook"
     class="group flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 hover:bg-blue-600 transition-all duration-300">
    <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
    </svg>
  </a>
  <a href="#" title="Soporte"
     class="group flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 hover:bg-green-500 transition-all duration-300">
    <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 11-7.6-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
    </svg>
  </a>
</div>

<div class="space-y-20 pt-16">

    {{-- Título catálogo --}}
    <div class="text-center space-y-3">
        <span class="text-blue-600 text-lg font-bold uppercase tracking-widest">Catálogo</span>
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
            Conoce Nuestros Ultimos Productos
        </h1>
        <p class="text-gray-500 text-lg max-w-xl mx-auto">
            Encuentra todo lo que necesitas para destacar en la cancha.
        </p>
        <div class="flex items-center justify-center gap-3 pt-1">
            <div class="h-px w-16 bg-gray-200"></div>
            <div class="w-2 h-2 rounded-full bg-blue-600"></div>
            <div class="h-px w-16 bg-gray-200"></div>
        </div>
    </div>

    {{-- Grid productos --}}
    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach($productos as $producto)
        <div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm flex flex-col overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                <img src="{{ asset('storage/'.$producto->imagen) }}"
                    alt="{{ $producto->nombre }}"
                    class="w-full h-full object-cover object-center">
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">
                    {{ $producto->categoria->nombre ?? 'Producto' }}
                </span>
                <h3 class="text-base font-bold text-gray-800 mb-2 line-clamp-2">
                    {{ $producto->nombre }}
                </h3>
                <div class="flex items-baseline space-x-2 mb-4">
                    <span class="text-xl font-extrabold text-gray-950">
                        S/ {{ $producto->precio }}
                    </span>
                </div>
                <a href="/productos" class="mt-auto w-full bg-blue-600 text-white text-sm font-semibold py-2.5 px-4 rounded-xl shadow-sm text-center hover:bg-blue-700 transition">
                    Ver Producto
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Banner CTA --}}
    <div class="relative bg-gradient-to-r from-blue-700 to-indigo-900 rounded-3xl overflow-hidden shadow-lg px-8 py-12 md:p-16 flex flex-col md:flex-row md:items-center md:justify-between gap-8">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10 max-w-xl">
            <span class="text-blue-200 text-xs font-bold uppercase tracking-widest bg-blue-600/50 px-3 py-1 rounded-full">Temporada 2026</span>
            <h2 class="text-3xl font-extrabold text-white mt-4 sm:text-4xl">¿Listo para equiparte como un verdadero crack?</h2>
            <p class="text-blue-100 mt-3 text-lg">Explora nuestra nueva colección de indumentaria deportiva con tecnología de alto rendimiento.</p>
        </div>
        <div class="relative z-10 flex-shrink-0">
            <a href="#" class="inline-flex items-center justify-center bg-white text-blue-700 font-bold px-6 py-4 rounded-xl shadow-md hover:bg-blue-50 transition duration-200 text-base">
                Ver Equipamiento Completo
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>

    {{-- Beneficios --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center space-y-3">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="font-bold text-gray-900 text-lg">Calidad Garantizada</h3>
            <p class="text-gray-500 text-sm">Todos nuestros productos pasan por un estricto control de calidad antes de llegar a tus manos.</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center space-y-3">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="font-bold text-gray-900 text-lg">Entrega Rápida</h3>
            <p class="text-gray-500 text-sm">Recibe tu pedido en la puerta de tu casa en el menor tiempo posible.</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center space-y-3">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
            </div>
            <h3 class="font-bold text-gray-900 text-lg">Pago Seguro</h3>
            <p class="text-gray-500 text-sm">Múltiples métodos de pago con total seguridad y respaldo en cada transacción.</p>
        </div>
    </div>

    {{-- Newsletter --}}
    <div class="bg-white rounded-3xl border border-gray-100 p-10 md:p-14 shadow-sm">
        <div class="max-w-2xl mx-auto text-center space-y-4">
            <span class="text-blue-600 text-sm font-bold uppercase tracking-widest">Newsletter</span>
            <h3 class="text-2xl font-extrabold text-gray-900">¡Recibe ofertas exclusivas!</h3>
            <p class="text-gray-500">Suscríbete y obtén un <span class="text-blue-600 font-bold">10% de descuento</span> en tu primera compra. Sin spam, solo ofertas reales.</p>
            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <input type="email" placeholder="Tu correo electrónico" required 
                    class="flex-1 px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-8 py-3 rounded-xl shadow-sm transition whitespace-nowrap">
                    Suscribirme
                </button>
            </div>
        </div>
    </div>

</div>

@endsection