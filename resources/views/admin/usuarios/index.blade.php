@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('usuarios.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Nuevo Usuario

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="thead-dark">

                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th width="220">Acciones</th>
                </tr>

            </thead>

            <tbody>

            @foreach($usuarios as $usuario)

                <tr>

                    <td>{{ $usuario->id }}</td>

                    <td>

                        @if($usuario->foto)

                        <img src="{{ asset('storage/'.$usuario->foto) }}"
                            style="
                                width:80px;
                                height:80px;
                                border-radius:10px;
                                object-fit:cover;
                                border:1px solid #ddd;
                            ">


                        @else
                        <img src="https://via.placeholder.com/80"
                        style="
                            width:80px;
                            height:80px;
                            border-radius:10px;
                            object-fit:cover;
                        ">

                        @endif

                    </td>

                    <td>{{ $usuario->name }}</td>

                    <td>{{ $usuario->email }}</td>

                    <td>

                        @if($usuario->rol == 'admin')

                            <span class="badge badge-danger">
                                Administrador
                            </span>

                        @else

                            <span class="badge badge-success">
                                Cliente
                            </span>

                        @endif

                    </td>

                    <td>

                    <a href="{{ route('usuarios.edit',$usuario->id) }}"
                    class="btn btn-warning btn-sm mr-2">

                        <i class="fas fa-edit"></i> Editar

                    </a>

                    <form action="{{ route('usuarios.destroy',$usuario->id) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">

                            <i class="fas fa-trash"></i> Eliminar

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