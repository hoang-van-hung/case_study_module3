@extends('frontend.master')
@section('content')
    <h2 class="section-title"><strong>List Cart</strong></h2>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            @csrf
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>

                <div class="col col-md-9">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th>STT</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-image">Image</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->items as $key => $item)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="{{ route('cart.removeProduct', $key) }}">×</a>
                                        </td>
                                        <td class="product-remove">
                                            {{ $key }}
                                        </td>

                                        <td class="product-thumbnail">
                                            <div style="width: 80px; height: 80px">
                                                <img src="{{ asset('storage/' . $item['products']->img) }}">
                                            </div>

                                        </td>

                                        <td class="product-name">
                                            {{ $item['products']->name }}
                                        </td>
                                        <td class="product-price">
                                            {{ $item['products']->price }}
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input min="0" step="1" name="quantity_product[{{$key}}]" data-id="{{$key}}"
                                                       type="number" value="{{ $item['totalQty'] }}" class="quantity_product" >
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            {{ $item['totalPrice'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <h4>TotalMoney Cart: {{ number_format($cart->totalPrice, 0, '.','.') }}</h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div >
                                    <a href="{{ route('cart.show_form') }}" class="btn btn-success" >Check Out</a>
                                    <button class="btn btn-sm btn-primary" style="padding: 7px 10px" type="submit">Update Cart</button>
                                    <span><a href="{{ route('cart.delete') }}" class="btn btn-danger">Delete Cart</a></span>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
