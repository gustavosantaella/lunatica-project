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
                    <td>
                        Nombre
                    </td>
                    <td>
                        Precio
                    </td>
                    <td>
                        Cantidad
                    </td>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as  $product)
                <tr>
                    <td><img src="{{ $product->foto }}" width="50" height="50" alt=""></td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->precio }}</td>
                    <td>{{ $product->cantidad }}</td>
                    <td>
                        <a href="{{ route("products.edit", ['product' => $product->id]) }}" class="fas fa-edit"></a>
                        <a  href="{{ route("products.destroy", ['product' => $product->id]) }}" class="fas fa-trash  text-danger"></a>
                    </td>

                </tr>




                @endforeach
            </tbody>
        </table>
    </div>
@stop
