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
            @php
                $total = 0;
            @endphp
            @foreach (session('car', []) as $key => $product)
                <tr>
                    <th> {{ $key }} </th>
                    <td> {{ $product['nombre'] }} </td>
                    <td> {{ $product['quantity'] }} </td>
                    <td> {{ $product['precio'] }} </td>
                </tr>
                @php
                    $total += $product['precio'] * $product['quantity'];
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th style="text-align:right !important" colspan="3">TOTAL</th>
                <th>{{ $total }}$</th>
            </tr>
        </tfoot>
    </table>

    <form action="#">
        <button class="btn btn-primary">Comprar</button>
    </form>
@endsection
