@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Upload Image</h1>

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            {!! Form::open(['route' => ['products.images.store', $product->id], 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection