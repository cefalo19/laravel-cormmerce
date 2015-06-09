@extends('layouts/store')

@section('categories')
    @include('partials/categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--products_items-->
            <h2 class="title text-center">Categoria: {{ $products->first()->category->name  }}</h2>

            @forelse($products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            @if (count($product->images))
                            <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="200" />
                            @else
                            <img src="{{ url('images/no-img.jpg') }}" alt="" width="200" />
                            @endif

                            <h2>R$ {{ $product->price }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="http://localhost:8000/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{ $product->price }}</h2>
                                <p>{{ $product->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div><!--products_items-->
    </div>
@stop