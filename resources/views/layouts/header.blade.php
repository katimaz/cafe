<!-- Header -->
<header id="header" class="light">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Logo -->
                <div class="module module-logo dark">
                    <a href="{{url('/order')}}">
                        <img src="/public/assets/img/logo-light.svg" alt="" width="88">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Navigation -->
                <nav class="module module-navigation left mr-4">
                    <ul id="nav-main" class="nav nav-main">
                        <li><a href="{{url('order/menu')}}"><span>Menu</span></a></li>
                        <li><a href="{{url('order/order-list')}}"><span>Check My Order</span></a>
                    </ul>
                </nav>
                {{--<div class="module left">--}}
                    {{--<a href="{{url('menu')}}" class="btn btn-outline-secondary"><span>Menu</span></a>--}}
                    {{--<a href="{{url('order-list')}}" class="btn btn-outline-secondary"><span>My Orders</span></a>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-2">
                <a href="#" class="module module-cart right" data-toggle="panel-cart">
                    @if(Session::has('tableId'))
                    	<span class="cart-value">Table : {{Session::get('tableId')}}</span>
                    @endif
                    <span class="cart-icon">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="notification">{{Session::has('cart')?Count(Session::get('cart')->items):0}}</span>
                    </span>
                    <span class="cart-value totalPrice" >${{Session::has('cart')?Session::get('cart')->totalPrice:0}}</span>
                </a>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="light">

    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
    </div>

    <div class="module module-logo">
        <a href="{{url('/order')}}">
            <img src="/public/assets/img/logo-horizontal-dark.svg" alt="">
        </a>
    </div>

    <a href="#" class="module module-cart" data-toggle="panel-cart">
        @if(Session::has('tableId'))
            <span class="cart-value" style="padding-right: 10px">Table : {{Session::get('tableId')}}</span>
        @endif
        <i class="ti ti-shopping-cart"></i>
        <span class="notification">{{Session::has('cart')?Count(Session::get('cart')->items):0}}</span>
    </a>

</header>

<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="/public/assets/img/logo-light.svg" alt="" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
    </div>
    <nav class="module module-navigation"></nav>
    {{--<div class="module module-social">--}}
        {{--<h6 class="text-sm mb-3">Follow Us!</h6>--}}
        {{--<a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>--}}
        {{--<a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>--}}
        {{--<a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>--}}
        {{--<a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>--}}
        {{--<a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>--}}
    {{--</div>--}}
</nav>