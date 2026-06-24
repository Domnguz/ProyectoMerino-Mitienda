@extends('adminlte::page')

@section('title', 'Detalle Pedido')

@section('content_header')
    <h1>Pedido #{{ $pedido->id }}</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3>
            Cliente:
            {{ $pedido->usuario->name ?? 'Sin usuario' }}
        </h3>

        <h4>
            Estado:
            {{ $pedido->estado }}
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

            @foreach($pedido->detalles as $detalle)

                <tr>

                    <td>
                        {{ $detalle->producto->nombre }}
                    </td>

                    <td>
                        {{ $detalle->cantidad }}
                    </td>

                    <td>
                        S/ {{ number_format($detalle->precio,2) }}
                    </td>

                    <td>
                        S/ {{ number_format($detalle->subtotal,2) }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-4">

            <h3>
                Total:
                S/ {{ number_format($pedido->total,2) }}
            </h3>

        </div>

    </div>

</div>

@stop