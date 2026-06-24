@extends('adminlte::page')

@section('title', 'Panel de Administración')

@section('content_header')
    <h1>Panel de Administración</h1>
@stop

@section('content')

@if($pedidosPendientes > 0)

<div class="alert alert-warning">

    <h5>
        <i class="fas fa-bell"></i>

        Tienes {{ $pedidosPendientes }} pedido(s) pendiente(s) por revisar.
    </h5>

</div>

@endif
<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalProductos }}</h3>

                <p>Productos</p>

            </div>

            <div class="icon">
                <i class="fas fa-box"></i>
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalCategorias }}</h3>

                <p>Categorías</p>

            </div>

            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $totalPedidos }}</h3>

                <p>Pedidos</p>

            </div>

            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>S/ {{ number_format($ventasTotales, 2) }}</h3>

                <p>Ventas Totales</p>

            </div>

            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>

        </div>

    </div>

</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-primary">

        <div class="inner">

            <h3>{{ $pedidosPendientes }}</h3>

            <p>Pedidos Pendientes</p>

        </div>

        <div class="icon">
            <i class="fas fa-bell"></i>
        </div>

        <a href="{{ route('pedidos.index') }}"
           class="small-box-footer">

            Ver pedidos
            <i class="fas fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="card mt-4">

    <div class="card-header">

        <h3 class="card-title">
            Últimos Pedidos
        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

            @forelse($ultimosPedidos as $pedido)

                <tr>

                    <td>{{ $pedido->id }}</td>

                    <td>
                        {{ $pedido->usuario->name ?? 'Sin usuario' }}
                    </td>

                    <td>
                        S/ {{ number_format($pedido->total, 2) }}
                    </td>

                    <td>

                        @if($pedido->estado == 'Pendiente')

                            <span class="badge badge-warning">
                                {{ $pedido->estado }}
                            </span>

                        @elseif($pedido->estado == 'Pagado')

                            <span class="badge badge-success">
                                {{ $pedido->estado }}
                            </span>

                        @elseif($pedido->estado == 'Enviado')

                            <span class="badge badge-primary">
                                {{ $pedido->estado }}
                            </span>

                        @else

                            <span class="badge badge-info">
                                {{ $pedido->estado }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('pedidos.show', $pedido->id) }}"
                           class="btn btn-primary btn-sm">

                            Ver

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No hay pedidos registrados
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
@stop

