@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
<h1>Editar Producto</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('productos.update',$producto->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="form-group">
    <label>Categoría</label>

    <select name="categoria_id" class="form-control">

        @foreach($categorias as $categoria)

            <option value="{{ $categoria->id }}"
                {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>

                {{ $categoria->nombre }}

            </option>

        @endforeach

    </select>
</div>

<div class="form-group">
<label>Nombre</label>
<input type="text"
       name="nombre"
       value="{{ $producto->nombre }}"
       class="form-control">
</div>

<div class="form-group">
<label>Descripción</label>
<textarea name="descripcion"
          class="form-control">{{ $producto->descripcion }}</textarea>
</div>

<div class="form-group">
<label>Precio</label>
<input type="number"
       step="0.01"
       name="precio"
       value="{{ $producto->precio }}"
       class="form-control">
</div>

<div class="form-group">
<label>Stock</label>
<input type="number"
       name="stock"
       value="{{ $producto->stock }}"
       class="form-control">
</div>

<div class="form-group">
<label>Imagen Actual</label><br>

<img src="{{ asset('storage/'.$producto->imagen) }}"
     width="150">

</div>

<div class="form-group">
<label>Nueva Imagen</label>

<input type="file"
       name="imagen"
       class="form-control">

</div>

<button class="btn btn-primary">
Actualizar Producto
</button>

</form>

</div>

</div>

@stop