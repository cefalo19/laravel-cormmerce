@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Orders</h1>

            <br>

            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>$ {{ $order->total }}</td>
                        <td>{{ $order->status->name }}</td>
                        <td>
                            <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $orders->render() !!}

        </div>
    </div>
</div>
@endsection
