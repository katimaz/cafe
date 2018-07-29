@extends('layouts.main')

@section('style')
@endsection

@section('content')
        <!-- Section - Main -->
        <section class="section section-main section-main-1 bg-light">

            <div class="container dark">
                <div class="slide-container">
                    <div id="section-main-1-carousel-image" class="image inner-controls">
                        @foreach($promotions as $promotion)
                            <div class="slide"><div class="bg-image"><img src="public/{{$promotion->image_url}}" alt=""></div></div>
                        @endforeach
                        <div class="slide"><div class="bg-image"><img src="public/assets/img/photos/slider-dessert.jpg" alt=""></div></div>
                    </div>
                    <div class="content dark">
                        <div id="section-main-1-carousel-content">
                            @foreach($promotions as $promotion)
                                <div class="content-inner">
                                    <h4 class="text-muted">{{$promotion->promotion_title}}</h4>
                                    <h1>{{$promotion->name}}</h1>
                                    <div class="btn-group">
                                        <span qty="1" product_id="{{$promotion->product_id}}" price="{{$promotion->price}}" class="btn btn-outline-primary btn-lg add-to-list"><span>Add to list</span></span>
                                        <span class="price price-lg">from ${{$promotion->price}}</span>
                                        {{--<span class="price price-lg">--}}
                                            {{--<div class="input-group input-number-group">--}}
                                                {{--<div class="input-group-button">--}}
                                                    {{--<span class="input-number-decrement">-</span>--}}
                                                {{--</div>--}}
                                                {{--<input class="input-number" type="number" value="1" min="1" max="20" readonly>--}}
                                                {{--<div class="input-group-button">--}}
                                                    {{--<span class="input-number-increment">+</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</span>--}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="content-inner">
                                <h1>Delicious Desserts</h1>
                                <h5 class="text-muted mb-5">Order it online even now!</h5>
                                <a href="{{route('menu')}}" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                            </div>
                        </div>
                        <nav class="content-nav">
                            <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
                            <a class="next" href="#"><i class="ti-arrow-right"></i></a>
                        </nav>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section - Menu -->
        <section class="section pb-0 protrude">

            <div class="container">
                <h1 class="mb-6">Our menu</h1>
            </div>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
                @foreach($menus as $menu)
                    <div class="menu-sample">
                        <a href="{{url('order/menu#'.$menu->name)}}">
                            <img src="public/{{$menu->image_url}}" alt="" class="image">
                            <h3 class="title">{{$menu->name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
@endsection

@section('script')
<script>
    $('.input-number-increment').click(function() {
        var $input = $(this).parents('.input-number-group').find('.input-number');
        var val = parseInt($input.val(), 10);
        var str;
        if (val < 20 ){
            $input.val(val + 1);
            str = $(this).parents('.price-lg').siblings('a').attr('href');
            var n = str.lastIndexOf("qty");
            str = str.substring(0, n);
            str = str+("qty="+(val+1));
            $(this).parents('.price-lg').siblings('a').attr('href',str);
        }
    });

    $('.input-number-decrement').click(function() {
        var $input = $(this).parents('.input-number-group').find('.input-number');
        var val = parseInt($input.val(), 10);
        var str;
        if(val > 1){
            $input.val(val - 1);
            str = $(this).parents('.price-lg').siblings('a').attr('href');
            var n = str.lastIndexOf("qty");
            str = str.substring(0, n);
            str = str+("qty="+(val-1));
            $(this).parents('.price-lg').siblings('a').attr('href',str);
        }
    })
</script>
@endsection