@extends('layouts/store')

@section('content')
        <div class="container">

                <h3>PEDIDO #{{ $order->id  }}</h3>

                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td>Produto</td>
                            <td>Quantidade</td>
                            <td>Valor</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name  }}</td>
                            <td>{{ $item->qtd  }}</td>
                            <td>{{ $item->price  }}</td>
                        </tr>
                    @endforeach
                         <tr>
                            <td colspan="2">Total</td>
                            <td>{{ $order->total }}</td>
                         </tr>
                    </tbody>
                </table>
        </div>
@stop