@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Images of {{ $product->name }}</h1>

            <br>

            <a href="{{ route('products.images.create', ['id' => $product->id]) }}" class="btn btn-default">New Image</a>

            <br>

            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Extension</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($product->images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>
                            <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                        </td>
                        <td>{{ $image->extension }}</td>
                        <td>
                            <a href="{{ route('products.images.destroy', ['id' => $image->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

        </div>
    </div>
</div>
@endsection
