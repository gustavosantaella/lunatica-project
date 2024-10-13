@extends('adminlte::page')

@section('title', 'Carrito de Compras')

@section('content_header')
    <h1>Carrito de Compras</h1>
@stop

@section('content')
    @if (session('car') && count(session('car')) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach (session('car') as $productId => $item)
                    <tr>
                        <td>{{ $item['nombre'] }}</td>
                        <td>
                            <form action="{{ route('car.update', $productId) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                    class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-success mt-1">Actualizar</button>
                            </form>
                        </td>
                        <td>${{ $item['precio'] }}</td>
                        <td>${{ $item['quantity'] * $item['precio'] }}</td>
                        <td>
                            <form action="{{ route('car.destroy', $productId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += $item['precio'] * $item['quantity'];
                    @endphp
                @endforeach
            </tbody>
        </table>
        <p><strong>Total a pagar: </strong>${{ $total }}</p>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
@stop
