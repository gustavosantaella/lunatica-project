@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>{{ $product ? 'Editar' : 'Crear' }} Producto</h1>
    </div>
@stop

@section('content')
    <form class="container-fluid"
        action="{{ !$product ? route('products.store') : route('products.update', ['product' => $product->id]) }}"
        method="POST">
        @csrf
        @method($product ? 'PUT' : 'POST')
        <div class="d-flex">
            <input class="form-control col-md-4" type="file" id="file">
            <div class="m-2"></div>
            <input class="form-control  col-md-4" name="nombre" placeholder="Nombre" type="text"
                value="{{ $product?->nombre }}" />
            <div class="m-2"></div>
        </div>
        <div class="d-flex">
            <input class="form-control mt-3 col-md-4" name="cantidad" placeholder="Cantidad" type="number" min="1"
                value="{{ $product?->cantidad }}" />
            <div class="m-2"></div>
            <input class="form-control mt-3 col-md-4" name="precio" placeholder="Precio" type="number"
                value="{{ $product?->precio }}" />
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary mt-3" />
    </form>
@stop
