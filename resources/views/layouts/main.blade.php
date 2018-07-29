<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="/public/assets/img/favicon.png">
    <link rel="apple-touch-icon" href="/public/assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/assets/img/favicon_152x152.png">

    @include('layouts.style')
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

        @media (min-width: 276px) {
            .well{
                width: 80%;
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        }

        @media (min-width: 576px) {
            .well{
                width: 70%;
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        }

        @media (min-width: 1200px) {
            .well{
                width: 30%;
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        }

    </style>
</head>
<body>
<div id="body-wrapper" class="animsition">
    @include('layouts.header')
    <div id="content">
        @yield('content')
        @include('layouts.cart')

        <div id="body-overlay"></div>
    </div>

    @include('layouts.footer')
    {{--@include('layouts.model')--}}
    {{--@if(!session()->has('printCode'))--}}
        {{--<div id="my_popup" class="well">--}}
            {{--<form action="{{url('order/validCode')}}" method="post">--}}
                {{--@csrf--}}
                {{--@if(!session()->has('tableId'))--}}
                {{--<div class="form-group">--}}
                    {{--<label>Table Id</label>--}}
                    {{--<input type="text" class="form-control" id="tableId" name="tableId" placeholder="Enter Table Id">--}}
                {{--</div>--}}
                {{--@endif--}}
                {{--<div class="form-group">--}}
                    {{--<label>Input Code</label>--}}
                    {{--<input type="text" class="form-control" id="printCode" name="print_code" placeholder="Enter Code">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--@endif--}}
    @include('layouts.script')
    <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>
    <script>
        $(document).ready(function() {

            // Initialize the plugin
            $('#my_popup').popup({
                autoopen:true,
                blur:false,
                escape:false,
            });

        });
    </script>
    <script>
        $('#cart-item').on('click','.cart-increment',function () {
            console.log("cart-increment");
            var $totalPrice = $(this).parents().parents('#one-item').find('.price');
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var $price = $(this).parents('.input-number-group').find('.single-price');
            var val = parseInt($input.val(), 10);
            var single_price = $price.val();

            if (val < 20 ){
                $input.val(val + 1);
                $.ajax({
                    type: 'get',
                    url: "change?id="+$input.attr('id')+"&qty="+(val+1)+"&price="+single_price,
                    success: function(result){
                        $json = JSON.parse(result);
                        $('.totalPrice').text("$"+$json['totalPrice']);
                        $totalPrice.text("$"+$json['price'])
                    }
                });
            }
        });

        $('#cart-item').on('click','.cart-decrement',function () {
            console.log("cart-decrement");
            var $totalPrice = $(this).parents().parents('#one-item').find('.price');
            var $input = $(this).parents('.input-number-group').find('.input-number');
            var $price = $(this).parents('.input-number-group').find('.single-price');
            var val = parseInt($input.val(), 10);
            var single_price = $price.val();

            if(val > 1){
                $input.val(val - 1);
                $.ajax({
                    type: 'get',
                    url: "change?id="+$input.attr('id')+"&qty="+(val-1)+"&price="+single_price,
                    success: function(result){
                        $json = JSON.parse(result);
                        $('.totalPrice').text("$"+$json['totalPrice']);
                        $totalPrice.text("$"+$json['price'])
                    }
                });
            }
        })

        $('.remove').click(function(){
            $.ajax({
                type: 'get',
                url: "remove?id="+$(this).attr('id'),
                success: function(result){
                    console.log(result);
                }
            });
        });

        $('.add-to-list').click(function(){
            product_id = $(this).attr("product_id");
            qty = $(this).attr("qty");
            price = $(this).attr("price");

            $.ajax({
                type: 'post',
                data: {price : price,qty : qty,id : product_id, _token: '{{csrf_token()}}'},
                url: '/addToList',
                success: function(result) {
                    $('#cart-item').empty();
                    $json = JSON.parse(result);
//                    console.log($json['totalPrice']);
//                    console.log($json['totalQty']);
                    html ='<tbody>';
                    for(var k in $json['items']) {
//                        console.log(k, $json['items'][k]);
//                        console.log(k, $json['items'][k]['items']['name']);
                        html +=
                            '<tr id="one-item">' +
                            '   <td class="title">' +
                            '       <span class="name"><a>'+$json['items'][k]['items']['name']+'</a></span>' +
                            '       <span class="caption text-muted">'+$json['items'][k]['items']['description']+'</span>' +
                            '   </td>' +
                            '   <td class="prices">$'+$json['items'][k]['singleprice']+'</td>' +
                            '   <td class="price">$'+$json['items'][k]['price']+'</td>' +
                            '   <td class="qty">' +
                            '       <div class="input-group input-number-group">' +
                            '           <div class="input-group-button">' +
                            '               <span class="cart-decrement">-</span>' +
                            '           </div>' +
                            '           <input id="'+$json['items'][k]['items']['id']+'" class="input-number" type="number" value="'+$json['items'][k]['qty']+'" min="1" max="20"' +
                            '                  readonly>' +
                            '           <input class="single-price" type="hidden" value="'+$json['items'][k]['singleprice']+'">' +
                            '           <div class="input-group-button">' +
                            '               <span class="cart-increment">+</span>' +
                            '           </div>' +
                            '       </div>' +
                            '   </td>' +
                            '   <td class="actions">' +
                            '       <a id="'+$json['items'][k]['items']['id']+'" href="" class="action-icon remove"><i class="ti ti-close"></i></a>' +
                            '   </td>' +
                            '</tr>';
                    }
                    html+='</tbody>';

                    $('#cart-item').html(html);

                    $('.totalPrice').text('$'+$json['totalPrice']);
                    $('.notification').text(Object.keys(($json['items'])).length);

                    $.blockUI({
                        css: {
                            padding: '30px',
                        },
                        message: '<h5 style="margin: 0px"><img src="/public/image/busy.gif" /> Just a moment...</h5>'
                    });

                    setTimeout($.unblockUI, 1000)

//                    $("#dialog").dialog({
//                        modal: true,
//                        resizable:false,
//                        draggable: false,
//                        open: function (event, ui) {
//                            setTimeout(function () {
//                                $("#dialog").dialog("close");
//                            }, 1000);
//                        }
//                    });
                },
            });
        });
    </script>
</div>
</body>
</html>
