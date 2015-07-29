@extends('layouts/store')

@section('content')
    <div class="container">

        @if ($order == 'empty')
        @section('categories')
            @include('partials/categories')
        @stop

        <h3>Carrinho de compras vazio</h3>
        @else
        <h3>Peido realizado com sucesso!</h3>

        <p>O pedido #{{ $order->id  }}, foi realizado com sucesso.</p>
        @endif

    </div>
@stop