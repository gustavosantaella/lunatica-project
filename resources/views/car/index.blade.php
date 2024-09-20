@extends('adminlte::page')

@section('title', 'Carrito de Compras')

@section('content_header')
    <h1>Carrito de Compras</h1>
@stop

@section('content')
    @if ($car && $car->items->count() > 0)
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
                @foreach ($car->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('car.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                    class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-success mt-1">Actualizar</button>
                            </form>
                        </td>
                        <td>${{ $item->product->precio }}</td>
                        <td>${{ $item->quantity * $item->product->precio }}</td>
                        <td>
                            <form action="{{ route('car.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
@stop
