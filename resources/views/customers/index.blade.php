@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop

@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Phone
                    </td>
                    <td>
                        Address
                    </td>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as  $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
