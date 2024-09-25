@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Crear</a>
    </div>
@stop

@section('content')
    <div class="w-100">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ $product->foto }}" width="50" height="50" alt=""></td>
                        <td>{{ $product->nombre }}</td>
                        <td>{{ $product->precio }}</td>
                        <td>{{ $product->cantidad }}</td>
                        <td class="flex">
                            <!-- Enlace para editar el producto -->
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                class="fas fa-edit mr-2"></a>


                            <!-- Enlace para eliminar el producto -->
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger border-0 bg-transparent"></button>
                            </form>

                            <!-- Formulario para añadir al carrito -->
                            <form action="{{ route('car.store') }}" method="POST"
                                style="display:inline-block; margin-left: 10px;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success btn-sm">Añadir al carrito</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
