@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Products</h1>

            <br>

            <a href="{{ route('products.create') }}" class="btn btn-default">New Product</a>

            <br>

            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ str_limit($product->description, $limit = 100, $end = '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('products.edit',    ['id' => $product->id]) }}">Edit</a> |
                            <a href="{{ route('products.images', ['id' => $product->id]) }}">Images</a> |
                            <a href="{{ route('products.destroy', ['id' => $product->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $products->render() !!}

        </div>
    </div>
</div>
@endsection
