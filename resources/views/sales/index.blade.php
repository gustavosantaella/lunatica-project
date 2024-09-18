@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>Ventas</h1>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Crear Venta</a>
    </div>
@stop

@section('content')
    <div class="w-100">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Producto</td>
                    <td>Cliente</td>
                    <td>Precio</td>
                    <td>Descuento</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->product->nombre }}</td>
                        <td>{{ $sale->customer->nombre }}</td>
                        <td>{{ $sale->price }}</td>
                        <td>{{ optional($sale->discount)->nombre ?? 'Sin Descuento' }}</td>
                        <td>
                            <a href="{{ route('sales.edit', ['sale' => $sale->id]) }}" class="fas fa-edit"></a>
                            <form action="{{ route('sales.destroy', ['sale' => $sale->id]) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger border-0 bg-transparent"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
