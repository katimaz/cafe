@extends('layouts.main')

@section('style')
    <style>
        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 13.33333px;
            right: 0;
            bottom: 0;
            left: 0;
            height: 40px;
            width: 40px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000;
        }
        .option-input:hover {
            background: #9faab7;
        }
        .option-input:checked {
            background: #40e0d0;
        }
        .option-input:checked::before {
            height: 40px;
            width: 40px;
            position: absolute;
            content: '✔';
            display: inline-block;
            font-size: 26.66667px;
            text-align: center;
            line-height: 40px;
        }
        .option-input:checked::after {
            -webkit-animation: click-wave 0.65s;
            -moz-animation: click-wave 0.65s;
            animation: click-wave 0.65s;
            background: #40e0d0;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
        }
        .option-input.radio {
            border-radius: 50%;
        }
        .option-input.radio::after {
            border-radius: 50%;
        }

        body label {
            display: block;
            line-height: 40px;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
@endsection

@section('content')
        <div class="page-title bg-light">
            <div class="bg-image bg-parallax"><img src="/assets/img/photos/bg-desk.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Payment</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>My Orders</h5>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">

                        <div class="row">
                            <div class="col-md-4">
                                <h3><strong>Name</strong></h3>
                            </div>
                            <div class="col-md-4">
                                <h3><strong>Price</strong></h3>
                            </div>
                            <div class="col-md-4">
                                <h3 style="text-align: right"><strong>Quantity</strong></h3>
                            </div>
                        </div>
                        <hr style="margin-top: 0px;">
                            @if(Session::has('cart'))
                                @foreach(Session::get('cart')->items as $item)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>{{$item['items']['name']}}</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>${{$item['price']}}</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h3 style="text-align: right">{{$item['qty']}}</h3>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0px;">
                                @endforeach
                            @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h3><strong>Total Price</strong></h3>
                            </div>
                            <div class="col-md-6">
                                @if(Session::has('cart'))
                                    <h3 style="text-align: right"><strong>${{Session::has('cart')?Session::get('cart')->totalPrice:0}}</strong></h3>
                                @endif
                            </div>
                        </div>
                        <hr style="margin-top: 0px;">
                    </div>
                </div>
            </div>
            <hr style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Order Methods</h5>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">
                        <div>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-4">
                                        <input type="radio" class="option-input radio" name="order_method" checked />
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Take Away</strong>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                    {{--<img style="width: 270px;height: 170px" src="{{url('public/image/visa-master.png')}}">--}}
                                    {{--</div>--}}
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-4">
                                        <input type="radio" class="option-input radio" name="order_method" checked />
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Eat In</strong>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                    {{--<img style="width: 270px;height: 170px" src="{{url('public/image/wechatpay.png')}}">--}}
                                    {{--</div>--}}
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Customer Information</h5>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">
                        <div>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-12">
                                       <label for="fname"><strong>Name</strong></label>
                                        <input type="text" id="name" name="name" placeholder="Your name..">
                                    </div>
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-12">
                                        <label for="fname"><strong>Telephone</strong></label>
                                        <input type="text" id="Telephone" name="telephone" placeholder="Your Telephone..">
                                    </div>
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-12">
                                        <label for="fname"><strong>Email</strong></label>
                                        <input type="text" id="email" name="email" placeholder="Your Email..">
                                    </div>
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-12">
                                        <label for="fname"><strong>Pick Up Time</strong></label>
                                        <input type="text" id="email" name="email" placeholder="Your Time..">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Payment Methods</h5>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">
                        <div>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-4">
                                        <input type="radio" class="option-input radio" name="payment_method" checked />
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Credit Card</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="width: 270px;height: 170px" src="{{url('public/image/visa-master.png')}}">
                                    </div>
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-4">
                                        <input type="radio" class="option-input radio" name="payment_method" checked />
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Wechatpay</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="width: 270px;height: 170px" src="{{url('public/image/wechatpay.png')}}">
                                    </div>
                                </div>
                            </label>
                            <label>
                                <div class="row" style="align-items: center">
                                    <div class="col-md-4">
                                        <input type="radio" class="option-input radio" name="payment_method" checked />
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Alipay</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="width: 270px;height: 170px" src="{{url('public/image/alipay.png')}}">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
