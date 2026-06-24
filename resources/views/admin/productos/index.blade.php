@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Productos</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h3 class="card-title">Productos Registrados</h3>

        <a href="{{ route('productos.create') }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>

    </div>

    <div class="card-body">

        <h4>Total productos: {{ $productos->count() }}</h4>

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($productos as $producto)
                <tr>

                    <td>{{ $producto->id }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                             width="80"
                             class="img-thumbnail">
                    </td>

                    <td>{{ $producto->nombre }}</td>
                    
                    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>

                    <td>S/ {{ $producto->precio }}</td>

                    <td>{{ $producto->stock }}</td>

                    <td>

                        <a href="{{ route('productos.edit', $producto->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('productos.destroy', $producto->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Está seguro de eliminar este producto?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop
