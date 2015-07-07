@extends('layouts/store')

@section('categories')
    @include('partials/categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--products_items-->
            <h2 class="title text-center">Tag: {{ $tag->name  }}</h2>

            @include('partials.product', ['products' => $products])
        </div><!--products_items-->
    </div>
@stop