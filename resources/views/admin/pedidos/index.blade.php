@extends('adminlte::page')

@section('title', 'Gestión de Pedidos')

@section('content_header') <h1> <i class="fas fa-shopping-bag"></i>
Gestión de Pedidos </h1>
@stop

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

<button type="button" class="close" data-dismiss="alert">
    <span>&times;</span>
</button>

{{ session('success') }}

</div>

@endif

<div class="row mb-3">

<div class="col-md-4">

    <div class="small-box bg-warning">

        <div class="inner">
            <h3>{{ $pedidos->where('estado', 'Pendiente')->count() }}</h3>
            <p>Pedidos Pendientes</p>
        </div>

        <div class="icon">
            <i class="fas fa-clock"></i>
        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="small-box bg-success">

        <div class="inner">
            <h3>{{ $pedidos->where('estado', 'Pagado')->count() }}</h3>
            <p>Pedidos Pagados</p>
        </div>

        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="small-box bg-danger">

        <div class="inner">
            <h3>{{ $pedidos->where('estado', 'Rechazado')->count() }}</h3>
            <p>Pedidos Rechazados</p>
        </div>

        <div class="icon">
            <i class="fas fa-times-circle"></i>
        </div>

    </div>

</div>

</div>

<div class="card shadow">

<div class="card-header bg-dark text-white">

    <h3 class="card-title">
        <i class="fas fa-list"></i>
        Lista de Pedidos
    </h3>

</div>

<div class="card-body">

    <table class="table table-hover table-bordered">

        <thead class="thead-light">

            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>

        @foreach($pedidos as $pedido)

            <tr>

                <td>#{{ $pedido->id }}</td>

                <td>
                    {{ $pedido->usuario->name ?? 'Sin usuario' }}
                </td>

                <td>
                    <strong>
                        S/ {{ number_format($pedido->total, 2) }}
                    </strong>
                </td>

                <td>

                    @if($pedido->estado == 'Pendiente')

                        <span class="badge badge-warning">
                            ⏳ Pendiente
                        </span>

                    @elseif($pedido->estado == 'Pagado')

                        <span class="badge badge-success">
                            ✅ Pagado
                        </span>

                    @elseif($pedido->estado == 'Enviado')

                        <span class="badge badge-primary">
                            🚚 Enviado
                        </span>

                    @elseif($pedido->estado == 'Entregado')

                        <span class="badge badge-info">
                            📦 Entregado
                        </span>

                    @elseif($pedido->estado == 'Rechazado')

                        <span class="badge badge-danger">
                            ❌ Rechazado
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('pedidos.show', $pedido->id) }}"
                       class="btn btn-primary btn-sm">

                        <i class="fas fa-eye"></i>
                        Ver

                    </a>

                </td>

                <td>

                    @if($pedido->estado == 'Pendiente')

                        <div class="d-flex">

                            <form action="{{ route('pedidos.aprobar', $pedido->id) }}"
                                  method="POST"
                                  class="mr-2 form-aprobar">

                                @csrf

                                <button class="btn btn-success btn-sm">
                                    Aprobar
                                </button>

                            </form>

                            <form action="{{ route('pedidos.rechazar', $pedido->id) }}"
                                  method="POST"
                                  class="form-rechazar">

                                @csrf

                                <button class="btn btn-danger btn-sm">
                                    Rechazar
                                </button>

                            </form>

                        </div>

                    @elseif($pedido->estado == 'Pagado')

                        <span class="badge badge-success">
                            Pagado
                        </span>

                    @elseif($pedido->estado == 'Enviado')

                        <span class="badge badge-primary">
                            Enviado
                        </span>

                    @elseif($pedido->estado == 'Entregado')

                        <span class="badge badge-info">
                            Entregado
                        </span>

                    @elseif($pedido->estado == 'Rechazado')

                        <span class="badge badge-danger">
                            Rechazado
                        </span>

                    @endif

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.form-aprobar').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        Swal.fire({
            title: '¿Aprobar pedido?',
            text: 'El stock se descontará automáticamente.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

document.querySelectorAll('.form-rechazar').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        Swal.fire({
            title: '¿Rechazar pedido?',
            text: 'Esta acción marcará el pedido como rechazado.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, rechazar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

</script>

@stop
