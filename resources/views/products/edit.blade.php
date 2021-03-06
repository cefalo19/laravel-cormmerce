@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Edit Product</h1>

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::hidden('featured', 0) !!}
                            {!! Form::checkbox('featured', 1, $product->featured) !!} Featured
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::hidden('recommend', 0) !!}
                            {!! Form::checkbox('recommend', 1, $product->recommend) !!} Recommend
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tags', 'Tags') !!}
                    {!! Form::textarea('tags', $product->getTagListAtrribute(), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection