@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
<h1>Categorías</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('categorias.create') }}"
           class="btn btn-primary">
            Nueva Categoría
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

            @foreach($categorias as $categoria)

            <tr>

                <td>{{ $categoria->id }}</td>

                <td>{{ $categoria->nombre }}</td>

                <td>{{ $categoria->descripcion }}</td>

            <td>

             <a href="{{ route('categorias.edit',$categoria->id) }}"
              class="btn btn-warning btn-sm">
               Editar
             </a>

        <form action="{{ route('categorias.destroy',$categoria->id) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('¿Deseas eliminar esta categoría?')">
            Eliminar
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