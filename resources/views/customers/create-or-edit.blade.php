@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>{{ $customer ? 'Editar' : 'Crear' }} cliente</h1>
    </div>
@stop

@section('content')
    <form class="contianer-fluid"
        action="{{ !$customer ? route('customers.store') : route('customers.update', ['customer' => $customer]) }}"
        method="POST">
        @csrf
        @method($customer ? 'PUT' : 'POST')
        <input class="form-control mt-3" name="nombre" placeholder="Nombre" type="text" value="{{ $customer?->nombre }}" />
        <input class="form-control mt-3" name="correo" placeholder="Correo" type="email"
            value="{{ $customer?->correo }}" />
        <input class="form-control mt-3" name="tlfn" placeholder="Telefono" type="text"
            value="{{ $customer?->tlfn }}" />
        <input type="submit" value="Enviar" class="btn btn-primary mt-3" />
    </form>
@stop
