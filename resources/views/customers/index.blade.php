@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop

@section('content')
    <div class="w-100">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Tlfn
                    </td>
                    <td>
                        Correo
                    </td>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as  $customer)
                <tr>
                    <td>{{ $customer->nombre }}</td>
                    <td>{{ $customer->tlfn }}</td>
                    <td>{{ $customer->correo }}</td>
                    <td>
                        <a href="{{ route("customers.edit", ['customer' => $customer->id]) }}" class="fas fa-edit"></a>
                        <a  href="{{ route("customers.destroy", ['customer' => $customer->id]) }}" class="fas fa-trash  text-danger"></a>
                    </td>

                </tr>




                @endforeach
            </tbody>
        </table>
    </div>
@stop
