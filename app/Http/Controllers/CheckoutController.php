<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;

class CheckoutController extends Controller
{
    public function index()
    {
        $carrito = session('carrito', []);

        return view('checkout', compact('carrito'));
    }

    public function procesar()
    {
        $carrito = session('carrito', []);

        if (count($carrito) == 0) {
            return redirect('/carrito');
        }

        $total = 0;

        foreach ($carrito as $item) {

            $producto = Producto::find($item['id']);

            if (!$producto) {

                return redirect('/carrito')
                    ->with('error', 'Producto no encontrado');
            }

            if ($producto->stock < $item['cantidad']) {

                return redirect('/carrito')
                    ->with(
                        'error',
                        'No hay suficiente stock para: ' . $producto->nombre
                    );
            }

            $total += $item['precio'] * $item['cantidad'];
        }
        $pedido = Pedido::create([
            'usuario_id' => Auth::id(),
            'fecha' => now(),
            'total' => $total,
            'estado' => 'pendiente'
        ]);
        foreach ($carrito as $item) {

            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio'],
                'subtotal' => $item['precio'] * $item['cantidad']
            ]);

            $producto = Producto::find($item['id']);

            if ($producto) {

                $producto->stock =
                    $producto->stock - $item['cantidad'];

                $producto->save();
            }

        }

        session()->forget('carrito');

        return redirect('/')
            ->with('success', 'Pedido realizado correctamente');
    }
}