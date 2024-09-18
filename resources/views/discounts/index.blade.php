@extends('adminlte::page')

@section('title', 'Discounts')

@section('content_header')
    <div class="d-flex flex-row justify-content-between ">
        <h1>Descuentos</h1>
        <a href="{{ route('discounts.create') }}" class="btn btn-primary">Crear Descuento</a>
    </div>
@stop

@section('content')
    <div class="w-100">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Tipo</td>
                    <td>Valor</td>
                    <td>Fechas</td>
                    <td>Activo</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <td>{{ $discount->name }}</td>
                        <td>{{ $discount->type == 'percentage' ? 'Porcentaje' : 'Fijo' }}</td>
                        <td>{{ $discount->type == 'percentage' ? $discount->value . '%' : '$' . $discount->value }}</td>
                        <td>
                            {{ $discount->start_date }} - {{ $discount->end_date ?? 'Indefinido' }}
                        </td>
                        <td>{{ $discount->active ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('discounts.edit', $discount->id) }}" class="fas fa-edit"></a>
                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger border-0 bg-transparent"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
