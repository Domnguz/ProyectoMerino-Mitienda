<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);

        return view('carrito', compact('carrito'));
    }

    public function agregar($id)
    {
        $producto = Producto::findOrFail($id);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {

            $carrito[$id]['cantidad']++;

        } else {

            $carrito[$id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);

        // Si la petición viene por AJAX
       return response()->json([
    'success' => true,
    'message' => 'Producto agregado al carrito',
    'cantidad' => collect($carrito)->sum('cantidad')
]);
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {

            unset($carrito[$id]);

            session()->put('carrito', $carrito);
        }

        return back();
    }
}
?>
