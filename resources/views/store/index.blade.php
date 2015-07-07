@extends('layouts/store')

@section('categories')
    @include('partials/categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @include('partials.product', ['products' => $featured])
        </div><!--features_items-->


        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @include('partials.product', ['products' => $recommend])
        </div><!--recommended-->
    </div>
@stop