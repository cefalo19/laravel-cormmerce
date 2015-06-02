@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Create Product</h1>

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            {!! Form::open(['route' => 'products.store']) !!}
                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('featured') !!} Featured
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('recommend') !!} Recommend
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection