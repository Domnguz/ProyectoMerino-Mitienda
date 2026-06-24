<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Producto;


class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('usuario')
                    ->latest()
                    ->get();

        return view(
            'admin.pedidos.index',
            compact('pedidos')
        );
    }

    public function show($id)
    {
        $pedido = Pedido::with([
            'usuario',
            'detalles.producto'
        ])->findOrFail($id);

        return view(
            'admin.pedidos.show',
            compact('pedido')
        );
    }
        public function cambiarEstado(Request $request, $id)
        {
            $pedido = Pedido::findOrFail($id);

            $pedido->estado = $request->estado;

            $pedido->save();

            return back()->with(
                'success',
                'Estado actualizado correctamente'
            );
        }
        public function aprobar($id)
        {
            $pedido = Pedido::with('detalles')->findOrFail($id);

            foreach ($pedido->detalles as $detalle) {

                $producto = Producto::find($detalle->producto_id);

                if ($producto) {

                    $producto->stock -= $detalle->cantidad;

                    $producto->save();
                }
            }

            $pedido->estado = 'Pagado';

            $pedido->save();

            return back()->with(
                'success',
                'Pedido aprobado correctamente'
            );
        }


        public function rechazar($id)
        {
            $pedido = Pedido::findOrFail($id);

            $pedido->estado = 'Rechazado';

            $pedido->save();

            return back()
                ->with('success', 'Pedido rechazado');
        }
}