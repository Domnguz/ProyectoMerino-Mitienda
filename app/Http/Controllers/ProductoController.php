<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();

        return view('productos', compact('productos', 'categorias'));
    }

    public function categoria($id)
    {
        $categoria = Categoria::findOrFail($id);

        $productos = Producto::where('categoria_id', $id)->get();

        return view('categoria', compact('categoria', 'productos'));
    }

    public function agregarCarrito($id)
    {
        $producto = Producto::findOrFail($id);

        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])){

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

        return redirect('/productos')
            ->with('success', 'Producto agregado al carrito');
    }
}