@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
<h1>Nuevo Usuario</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('usuarios.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Nombre</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Contraseña</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Rol</label>

                <select name="rol"
                        class="form-control">

                    <option value="cliente">
                        Cliente
                    </option>

                    <option value="admin">
                        Administrador
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Foto</label>

                <input type="file"
                       name="foto"
                       class="form-control">

            </div>

            <button class="btn btn-success">

                Guardar Usuario

            </button>

        </form>

    </div>

</div>

@stop