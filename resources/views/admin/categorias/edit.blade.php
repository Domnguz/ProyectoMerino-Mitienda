@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Editar Categoría</h3>
    </div>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>

                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $categoria->nombre }}"
                       required>
            </div>

            <div class="form-group">
                <label>Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="4">{{ $categoria->descripcion }}</textarea>
            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('categorias.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </div>

    </form>

</div>

@stop