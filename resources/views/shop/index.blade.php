@extends('layouts.shop-layout')


@section('content')
    <div class="">

        <div class="height d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($products as $product)
                <div class="card m-2 col-md-4">
                    <img class="card-img-top" src="{{ $product->foto ?? 'https://i.imgur.com/MGorDUi.png' }}" width="200">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="  ">{{ $product->nombre }}</h1>
                        </div>
                        <div class="card-text">
                            <p> {{ $product->descripcion ?? 'Una excelente opcion para vestir!' }}</p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="card-text mb-3">Cantidad disponible: {{ $product->cantidad }}</div>
                        <form action="{{ route('car.store') }}" method="POST"
                            style="display:inline-block; margin-left: 10px;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-danger">Añadir al carrito</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
@endsection
