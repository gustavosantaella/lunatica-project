@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>{{ isset($discount) ? 'Editar' : 'Crear' }} Descuento</h1>
    </div>
@stop

@section('content')
    <form class="container-fluid"
        action="{{ isset($discount) ? route('discounts.update', $discount->id) : route('discounts.store') }}" method="POST">
        @csrf
        @method(isset($discount) ? 'PUT' : 'POST')

        <div class="d-flex">
            <input class="form-control col-md-4" name="name" placeholder="Nombre" type="text"
                value="{{ $discount->name ?? '' }}" />
            <div class="m-2"></div>
            <select class="form-control col-md-4" name="type">
                <option value="percentage" {{ isset($discount) && $discount->type == 'percentage' ? 'selected' : '' }}>
                    Porcentaje</option>
                <option value="fixed" {{ isset($discount) && $discount->type == 'fixed' ? 'selected' : '' }}>Fijo</option>
            </select>
        </div>

        <div class="d-flex">
            <input class="form-control mt-3 col-md-4" name="value" placeholder="Valor" type="number" step="0.01"
                min="0" value="{{ $discount->value ?? '' }}" />
            <div class="m-2"></div>
            <input class="form-control mt-3 col-md-4" name="start_date" placeholder="Fecha de inicio" type="date"
                value="{{ $discount->start_date ?? '' }}" />
        </div>

        <div class="d-flex">
            <input class="form-control mt-3 col-md-4" name="end_date" placeholder="Fecha de fin" type="date"
                value="{{ $discount->end_date ?? '' }}" />
            <div class="m-2"></div>
            <select class="form-control mt-3 col-md-4" name="active">
                <option value="1" {{ isset($discount) && $discount->active ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ isset($discount) && !$discount->active ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <input type="submit" value="Enviar" class="btn btn-primary mt-3" />
    </form>
@stop
