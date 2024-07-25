@extends('layouts.shop-layout')


@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $key => $product )
            <tr>
                <th> {{ $key }} </th>
                <td> {{ $product->nombre }} </td>
                <td> {{ $product->cantidad }} </td>
                <td> {{ $product->precio }} </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align:right !important" colspan="3">TOTAL</th>
            <th>100$</th>
        </tr>
    </tfoot>
</table>

<form action="#">
    <button class="btn btn-primary">Comprar</button>
</form>
@endsection
