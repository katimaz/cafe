@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .input-number-group {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .input-number-group input[type=number]::-webkit-inner-spin-button,
        .input-number-group input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
        }

        .input-number-group .input-group-button {
            line-height: calc(80px/2 - 5px);
        }

        .input-number-group .input-number {
            width: 60px;
            padding: 0 12px;
            vertical-align: top;
            text-align: center;
            outline: none;
            display: block;
            margin: 0;
        }

        .input-number-group .input-number,
        .input-number-group .input-number-decrement,
        .input-number-group .input-number-increment,
        .input-number-group .cart-decrement,
        .input-number-group .cart-increment {
            border: 1px solid #cacaca;
            height: 40px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border-radius: 0;
        }

        .input-number-group .input-number-decrement,
        .input-number-group .input-number-increment,
        .input-number-group .cart-decrement,
        .input-number-group .cart-increment{
            display: inline-block;
            width: 30px;
            background: #e6e6e6;
            color: #0a0a0a;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            font-size: 2rem;
            font-weight: 400;
        }

        .input-number-group .input-number-decrement,
        .input-number-group .cart-decrement{
            margin-right: 0.3rem;
        }

        .input-number-group .input-number-increment,
        .input-number-group .cart-increment{
            margin-left: 0.3rem;
        }
    </style>
@endsection

    @section('content')
        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Menu</h1>
                        {{--<h4 class="text-muted mb-0">Some informations about our restaurant</h4>--}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <!-- Menu Navigation -->
                        <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                            <ul class="nav nav-menu bg-dark dark">
                                @foreach($menus as $menu)
                                    <li><a href="#{{$menu->name}}">{{$menu->name}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <!-- Menu Category / Burgers -->
                        @foreach($menus as $menu)
                            <div id="{{$menu->name}}" class="menu-category">
                                <div class="menu-category-title">
                                    <div class="bg-image"><img src="/public/{{$menu->image_menu_url}}" alt=""></div>
                                    <h2 class="title">{{$menu->name}}</h2>
                                </div>
                                <div class="menu-category-content padded">
                                    <div class="row gutters-sm">
                                        @foreach($productMenus as $productMenu)
                                            @if($productMenu->menu_id == $menu->id)
                                                <div class="col-lg-4 col-6">
                                                    <!-- Menu Item -->
                                                    <div class="menu-item menu-grid-item">
                                                        <img class="mb-4" src="/public/{{$productMenu->product_image_url}}" alt="">
                                                        <h6 class="mb-0">{{$productMenu->product_name}}</h6>
                                                        <span class="text-muted text-sm">{{$productMenu->description}}</span>
                                                        {{--<div class="row align-items-center mt-4">--}}
                                                            {{--<div class="col-sm-6" href="12">--}}
                                                                {{--<div class="input-group input-number-group">--}}
                                                                    {{--<div class="input-group-button">--}}
                                                                        {{--<span class="input-number-decrement">-</span>--}}
                                                                    {{--</div>--}}
                                                                    {{--<input class="input-number" type="number" value="1" min="1" max="20" readonly>--}}
                                                                    {{--<div class="input-group-button">--}}
                                                                        {{--<span class="input-number-increment">+</span>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><a class="btn btn-outline-secondary btn-sm add-to-list" href="{{url('addToList/?id='.$productMenu->product_id.'&qty=1')}}"><span>Add to list</span></a></div>--}}
                                                        {{--</div>--}}
                                                        <div class="row align-items-center mt-4">
                                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> ${{$productMenu->price}}</span></div>
                                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><span class="btn btn-outline-secondary btn-sm add-to-list" qty="1" product_id="{{$productMenu->product_id}}" price="{{$productMenu->price}}"><span>Add to list</span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>


        $('.input-number-increment').click(function() {
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var val = parseInt($input.val(), 10);
            var str;
            if (val < 20 ){
                $input.val(val + 1);
                str = $(this).parents('.col-sm-6').siblings('div').find('a').attr('href');
                var n = str.lastIndexOf("qty");
                str = str.substring(0, n);
                str = str+("qty="+(val+1));
                $(this).parents('.col-sm-6').siblings('div').find('a').attr('href',str);
            }
        });

        $('.input-number-decrement').click(function() {
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var val = parseInt($input.val(), 10);
            var str;
            if(val > 1){
                $input.val(val - 1);
                str = $(this).parents('.col-sm-6').siblings('div').find('a').attr('href');
                var n = str.lastIndexOf("qty");
                str = str.substring(0, n);
                str = str+("qty="+(val-1));
                $(this).parents('.col-sm-6').siblings('div').find('a').attr('href',str);
            }
        })
    </script>
@endsection