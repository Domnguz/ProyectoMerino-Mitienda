@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('usuarios.update',$usuario->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="form-group">

<label>Nombre</label>

<input type="text"
       name="name"
       class="form-control"
       value="{{ $usuario->name }}"
       required>

</div>

<div class="form-group">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control"
       value="{{ $usuario->email }}"
       required>

</div>

<div class="form-group">

<label>Rol</label>

<select name="rol"
        class="form-control">

<option value="cliente"
{{ $usuario->rol == 'cliente' ? 'selected' : '' }}>
Cliente
</option>

<option value="admin"
{{ $usuario->rol == 'admin' ? 'selected' : '' }}>
Administrador
</option>

</select>

</div>

<div class="form-group">

<label>Nueva Contraseña</label>

<input type="password"
       name="password"
       class="form-control">

<small class="text-muted">
Déjalo vacío si no deseas cambiarla.
</small>

</div>

<div class="form-group">

<label>Foto Actual</label>
<br>

@if($usuario->foto)

<img src="{{ asset('storage/'.$usuario->foto) }}"
     style="
     width:120px;
     height:120px;
     object-fit:cover;
     border-radius:10px;
     border:1px solid #ddd;
     ">

@endif

</div>

<div class="form-group">

<label>Nueva Foto</label>

<input type="file"
       name="foto"
       class="form-control">

</div>

<button class="btn btn-success">

Guardar Cambios

</button>

</form>

</div>

</div>

@stop