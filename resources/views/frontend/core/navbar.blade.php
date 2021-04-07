<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('product.show')}}">Home</a></li>

                    <li><a href="#">Iphones</a></li>
                    <li><a href="#">Ipad</a></li>
                    <li><a href="#">SamSung</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart({{ session()->get('cart')->totalQty ?? "0"}})</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>
                    <li>
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .mainmenu-area {
        padding-top: 30px;
    }
</style>
