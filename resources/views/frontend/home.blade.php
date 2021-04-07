@extends('frontend.test')
@section('content')
    @foreach($products as $product)
        <div class="single-product">
            <div class="product-f-image" style="height: 280px">
                <img src="{{ asset('storage/' . $product->img) }}">
                <div class="product-hover">
                    <a href="{{ route('cart.addToCart', $product->id) }}" class="add-to-cart-link"><i
                            class="fa fa-shopping-cart"></i> Add to cart</a>
                    <a href="{{route('product.detail',$product->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                </div>
            </div>

            <h2><a href="">{{ $product->name }}</a></h2>

            <div class="product-carousel-price">
                <del>$10000</del>
                <ins>${{ number_format($product->price, 0, '.','.') }}</ins>

            </div>
        </div>
    @endforeach


@endsection

