@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/public/css/jquery.timepicker.min.css" />
@endsection

@section('content')
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="/public/assets/img/photos/bg-croissant.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Checkout</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
                    <div class="row">
                        <div class="col-xl-5 push-xl-7 col-lg-5 push-lg-7">
                            <div class="shadow bg-white mb-4">
                                <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                                <table class="table-cart">
                                    @if(Session::has('cart'))
                                        @foreach(Session::get('cart')->items as $item)
                                            <tr id="one-item">
                                                <td class="title">
                                                    <span class="name"><a>{{$item['items']['name']}}</a></span>
                                                    <span class="caption text-muted">{{$item['items']['description']}}</span>
                                                </td>
                                                <td class="price">${{$item['price']}}</td>
                                                <td class="qty">
                                                    <div class="input-group input-number-group">
                                                        <div class="input-group-button">
                                                            <span class="cart-decrement">-</span>
                                                        </div>
                                                        <input id="{{$item['items']['id']}}" class="input-number" type="number" value="{{$item['qty']}}" min="1" max="20"
                                                               readonly>
                                                        <input class="single-price" type="hidden" value="{{$item['singleprice']}}">
                                                        <div class="input-group-button">
                                                            <span class="cart-increment">+</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="actions">
                                                    <a id="{{$item['items']['id']}}" href="" class="action-icon remove"><i class="ti ti-close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else

                                    @endif
                                </table>
                                <div class="cart-summary">
                                    <div class="row">
                                        <div class="col-7 text-right text-muted">Order total:</div>
                                        <div class="col-5"><strong id="totalPrice" class="totalPrice">${{Session::has('cart')?Session::get('cart')->totalPrice:0}}</strong></div>
                                    </div>
                                    {{--<div class="row">--}}
                                        {{--<div class="col-7 text-right text-muted">Devliery:</div>--}}
                                        {{--<div class="col-5"><strong>$3.99</strong></div>--}}
                                    {{--</div>--}}
                                    <hr class="hr-sm">
                                    <div class="row text-md">
                                        <div class="col-7 text-right text-muted">Total:</div>
                                        <div class="col-5"><strong id="totalPrice" class="totalPrice">${{Session::has('cart')?Session::get('cart')->totalPrice:0}}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 pull-xl-5 col-lg-7 pull-lg-5">
                            <div class="bg-white p-4 p-md-5 mb-4">
                                <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Order Type</h4>
                                <div class="row mb-5 text-lg">
                                    <div class="col-md-4 col-sm-6 form-group">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="order_type_option" class="custom-control-input order_type_option" value="1" checked>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Eat In</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 form-group">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="order_type_option" class="custom-control-input order_type_option" value="2">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Take Away</span>
                                        </label>
                                    </div>
                                </div>

                                <form id="eat_in_form" method="post" action="{{url('order/confirm')}}">
                                    @csrf
                                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="1">
                                    <input type="hidden" name="order_type" id="order_type" value="1">
                                    <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                                    <div class="row mb-5">
                                        <div id="div_table_id" class="form-group col-sm-12">
                                            <label>Table Id:</label>
                                            <input type="text" class="form-control" name="table_id" id="table_id" autocomplete="off" placeholder="Table Id" required>
                                        </div>
                                    </div>

                                    {{--<h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>--}}
                                    {{--<div class="row mb-5">--}}
                                        {{--<div class="form-group col-sm-6">--}}
                                            {{--<label>Delivery time:</label>--}}
                                            {{--<div class="select-container">--}}
                                                {{--<select class="form-control">--}}
                                                    {{--<option>As fast as possible</option>--}}
                                                    {{--<option>In one hour</option>--}}
                                                    {{--<option>In two hours</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                                    <div class="row text-lg">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">AliPay</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="2">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">WechatPay</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="3" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Credit Card</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="4">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cash</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-primary btn-lg"><span>Order now!</span></button>
                                    </div>
                                </form>

                                <form id="take_away_form" method="post" action="{{url('order/confirm')}}" style="display:none">
                                    @csrf
                                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="1">
                                    <input type="hidden" name="order_type" id="order_type" value="2">
                                    <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                                    <div class="row mb-5">
                                        <div id="div_name" class="form-group col-sm-12">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Name" required>
                                        </div>
                                        <div id="div_phone_number" class="form-group col-sm-12">
                                            <label>Phone number:</label>
                                            <input type="text" class="form-control" name="phone" id="phone" autocomplete="off" placeholder="Phone Number" required>
                                        </div>
                                        <div id="div_email" class="form-group col-sm-12">
                                            <label>E-mail address:</label>
                                            <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" required>
                                        </div>
                                        <div id="div_pick_time" class="form-group col-sm-12">
                                            <label>Pick Up Time:</label>
                                            <input type="text" class="time ui-timepicker-input form-control" autocomplete="off" name="pickup_time" id="pickup_time" placeholder="Pick Up Time" required>
                                        </div>
                                    </div>

                                    {{--<h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>--}}
                                    {{--<div class="row mb-5">--}}
                                    {{--<div class="form-group col-sm-6">--}}
                                    {{--<label>Delivery time:</label>--}}
                                    {{--<div class="select-container">--}}
                                    {{--<select class="form-control">--}}
                                    {{--<option>As fast as possible</option>--}}
                                    {{--<option>In one hour</option>--}}
                                    {{--<option>In two hours</option>--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                                    <div class="row text-lg">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">AliPay</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="2">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">WechatPay</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="3" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Credit Card</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="payment_type" class="custom-control-input" value="4">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cash</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-lg"><span>Order now!</span></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="/public/js/jquery.timepicker.min.js"></script>
    <script>
        $('#pickup_time').timepicker({
            timeFormat:'H:i',
            minTime: new Date().toLocaleTimeString('en-US', { hour12: false, hour: "numeric", minute: "numeric"}),
            maxTime: '22:00'
        });

        $( "#eat_in_form" ).submit(function( event ) {
            $(this).submit(function() {
                return false;
            });
            return true;
        });

        $( "#take_away_form" ).submit(function( event ) {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
        $( ".order_type_option" ).click(function() {
            if($(this).val()==1){
                $( "#name" ).val("");
                $( "#order_type" ).val($(this).val());
                $( "#take_away_form" ).hide();
                $( "#eat_in_form" ).show();
            }else{
                $( "#table_id" ).val("");
                $( "#order_type" ).val($(this).val());
                $( "#take_away_form" ).show();
                $( "#eat_in_form" ).hide();
            }
        });
    </script>
@endsection
