<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Pedido;

class DashboardController extends Controller
{
    public function index()
{
    $totalProductos = Producto::count();

    $totalCategorias = Categoria::count();

    $totalPedidos = Pedido::count();

    $ventasTotales = Pedido::whereIn('estado', [
        'Pagado',
        'Enviado',
        'Entregado'
    ])->sum('total');

    $pedidosPendientes = Pedido::where('estado', 'Pendiente')->count();

    $ultimosPedidos = Pedido::with('usuario')
                        ->latest()
                        ->take(5)
                        ->get();

    return view('admin.dashboard', compact(
        'totalProductos',
        'totalCategorias',
        'totalPedidos',
        'ventasTotales',
        'pedidosPendientes',
        'ultimosPedidos'
    ));
}
}