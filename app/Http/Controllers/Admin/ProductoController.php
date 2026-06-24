<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('admin.productos.index', compact('productos'));
    }


    public function create()
{
    $categorias = Categoria::all();

    return view('admin.productos.create', compact('categorias'));
}

public function store(Request $request)
{
    $rutaImagen = null;

    if ($request->hasFile('imagen')) {

        $rutaImagen = $request->file('imagen')
                              ->store('productos', 'public');
    }

    Producto::create([

        'categoria_id' => $request->categoria_id,
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'imagen' => $rutaImagen,

    ]);

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto creado correctamente');
}


    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }


    public function edit(string $id)
{
    $producto = Producto::findOrFail($id);

    $categorias = Categoria::all();

    return view(
        'admin.productos.edit',
        compact('producto', 'categorias')
    );
}

    public function update(Request $request, string $id)
    {
    $producto = Producto::findOrFail($id);

    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->categoria_id = $request->categoria_id;

    if($request->hasFile('imagen')){

        $ruta = $request->file('imagen')->store('productos','public');

        $producto->imagen = $ruta;
    }

    $producto->save();

    return redirect()->route('productos.index')
                     ->with('success','Producto actualizado');
}


    public function destroy(string $id)
    {
    $producto = Producto::findOrFail($id);

    // Eliminar la imagen del almacenamiento
    if ($producto->imagen) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($producto->imagen);
    }

    // Eliminar el producto de la base de datos
    $producto->delete();

    return redirect()->route('productos.index')
                     ->with('success', 'Producto eliminado correctamente.');
}
    }