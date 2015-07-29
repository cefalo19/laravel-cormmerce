@extends('layouts/store')

@section('content')
    <div class="container">

        <h3>Meus pedidos</h3>

        <table class="table">
            <tbody>
                <tr>
                    <th>#ID</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                            @endforeach
                        </ul>

                    </td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop