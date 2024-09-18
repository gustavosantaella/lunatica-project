@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>{{ isset($sale) ? 'Editar' : 'Crear' }} Venta</h1>
    </div>
@stop

@section('content')
    <form class="container-fluid"
        action="{{ isset($sale) ? route('sales.update', ['sale' => $sale->id]) : route('sales.store') }}" method="POST">
        @csrf
        @method(isset($sale) ? 'PUT' : 'POST')

        <div class="d-flex">
            <select class="form-control col-md-4" name="product_id">
                <option value="">Seleccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ isset($sale) && $sale->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->nombre }}
                    </option>
                @endforeach
            </select>
            <div class="m-2"></div>
            <select class="form-control col-md-4" name="customer_id">
                <option value="">Seleccione un cliente</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ isset($sale) && $sale->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex">
            <input class="form-control mt-3 col-md-4" name="price" placeholder="Precio" type="number" min="0"
                value="{{ isset($sale) ? $sale->price : '' }}" />
            <div class="m-2"></div>
            <select class="form-control mt-3 col-md-4" name="discount_id">
                <option value="">Sin Descuento</option>
                @foreach ($discounts as $discount)
                    <option value="{{ $discount->id }}"
                        {{ isset($sale) && $sale->discount_id == $discount->id ? 'selected' : '' }}>
                        {{ $discount->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Enviar" class="btn btn-primary mt-3" />
    </form>
@stop
