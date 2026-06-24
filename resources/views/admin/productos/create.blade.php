@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

            <form action="{{ route('productos.store') }}"
             method="POST"
             enctype="multipart/form-data">
         
             @csrf

             <div class="mb-3">
    <label>Categoría</label>

                <select name="categoria_id" class="form-control" required>

                <option value="">Seleccione una categoría</option>

                @foreach($categorias as $categoria)

                    <option value="{{ $categoria->id }}">
                    {{ $categoria->nombre }}
                    </option>

                @endforeach

            </select>
</div>
    
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control"
                          rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Precio</label>
                <input type="number"
                       step="0.01"
                       name="precio"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number"
                       name="stock"
                       class="form-control"
                       required>
            </div>
            <div class="mb-3">
           <label>Imagen</label>
           <input type="file"
           name="imagen"
           class="form-control">
           </div>


            <button type="submit" class="btn btn-success">
                Guardar Producto
            </button>

            <a href="{{ route('productos.index') }}"
               class="btn btn-secondary">
                Volver
            </a>

        </form>

    </div>

</div>

@stop