@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')

<style>
    .a-button{
        height: 100px;
    }
    .corners {
        border-radius: 25px;
        border: 2px solid black;
        padding: 20px;
    }

    .bigModel{
        width:95%;
    }
</style>
@stop

@section('content_header')
    <h1>管理</h1>
@stop

@section('content')

    <button id="12" type="button" class="btn btn-primary open-table" data-toggle="modal" data-target="#table">
        桌號12
    </button>

    <button id="1" type="button" class="btn btn-primary open-table" data-toggle="modal" data-target="#table">
        桌號1
    </button>

    <!-- Main Table Modal -->
    <div class="modal fade" id="table" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered bigModel" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title"></h1>
                    <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#addTable"><h3>新增桌號</h3></button>
                </div>
                <div id="main-table" class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg bigModel" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title" id="payment-title"></h1>
                    <input style="font-size: 24px" type="button" class="btn btn-secondary pull-right" id="printReceipt" value="影印收據"/>
                </div>
                <div id="main-payment" class="modal-body">
                    <div class="container-fluid">
                        <div class="row" id="payment-table">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" id="paymentForm" method="post" action="{{url('admin/orderPayment')}}">
                        @csrf
                        <input type="hidden" id="payment_table_id" name="payment_table_id" value=""/>
                        <input type="hidden" name="restaurant_id" value="1"/>
                        <input type="hidden" name="order_type" value="1"/>

                        <div class="row">
                            <div class="col-sm-3">
                                <label class="radio-inline" style="font-size: 33px;">
                                    <input style="margin-top: 16px;" type="radio" name="payment_type" value="1" checked>現金
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline" style="font-size: 33px;">
                                    <input style="margin-top: 16px;" type="radio" name="payment_type" value="2">信用卡
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline" style="font-size: 33px;">
                                    <input style="margin-top: 16px;" type="radio" name="payment_type" value="3">八達通
                                </label>
                            </div>
                        </div>
                        <input style="font-size: 24px" type="submit" class="btn btn-secondary pull-right" value="確認"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Detail Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg bigModel" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title" id="detail-title"></h1>
                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addFood"><h3>新增食物</h3></button>
                        {{--<button type="button" class="btn btn-secondary payment"><h3>付款</h3></button>--}}
                    </div>
                </div>
                <div id="main-detail" class="modal-body">
                    <div class="container-fluid">
                        <div class="row" id="detail-table">
                        </div>
                    </div>
                    <hr/>
                    <div class="container-fluid">
                        <div class="row" id="detail-food">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Modal -->
    <div class="modal fade" id="addTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg bigModel" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title" id="payment-title"></h1>
                </div>
                <form class="form-horizontal" id="orderForm" method="post" action="{{url('admin/orderTable')}}">
                    @csrf
                    <input type="hidden" id="table_id" name="table_id" value=""/>
                    <input type="hidden" name="restaurant_id" value="1"/>
                    <input type="hidden" name="order_type" value="1"/>

                    <br/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="font-size: 20px;">人數</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="people" id="people" type="number" placeholder="人數" style="font-size: 20px;">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <ul class="nav nav-pills nav-justified">
                                @foreach($menus as $menu)
                                    @if($menu->name =="小食")
                                        <li class="active"><a style="font-size: 32px;" data-toggle="pill" href="#{{$menu->name}}">{{$menu->name}}</a></li>
                                    @elseif($menu->name =="貝果/牛角包")
                                        <li><a style="font-size: 32px;" data-toggle="pill" href="#貝果牛角包">{{$menu->name}}</a></li>
                                    @else
                                        <li><a style="font-size: 32px;" data-toggle="pill" href="#{{$menu->name}}">{{$menu->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach($menus as $menu)
                                    @if($menu->name =="小食")
                                        <div id="{{$menu->name}}" class="tab-pane fade in active">
                                    @elseif($menu->name =="貝果/牛角包")
                                        <div id="貝果牛角包" class="tab-pane fade">
                                    @else
                                        <div id="{{$menu->name}}" class="tab-pane fade">
                                    @endif
                                        <div class="row">
                                            @foreach($productMenus as $productMenu)
                                                @if($productMenu->menu_id == $menu->id)
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-9">
                                                            <h2 class="control-label pull-left">{{$productMenu->product_name}}</h2>
                                                        </div>
                                                        <div class="col-xs-12 col-md-3">
                                                            <h2 class="control-label">${{$productMenu->price}}</h2>
                                                        </div>
                                                    </div>
                                                    <input name="{{$productMenu->product_id}}" style="font-size: 34px" class="form-control number-type" type="number" value="0" min="0" max="20" readonly/>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input style="font-size: 24px" type="submit" class="btn btn-secondary pull-right" value="確認"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addFood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg bigModel" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title" id="add_food_title"></h1>
                </div>
                <form id="orderAddFoodForm" method="post" action="{{url('admin/orderAddFood')}}">
                    @csrf
                    <input type="hidden" id="add_food_table_id" name="add_food_table_id" value=""/>
                    <input type="hidden" name="restaurant_id" value="1"/>
                    <input type="hidden" name="order_type" value="1"/>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <ul class="nav nav-pills nav-justified">
                                @foreach($menus as $menu)
                                    @if($menu->name =="小食")
                                        <li class="active"><a style="font-size: 32px;" data-toggle="pill" href="#{{$menu->name}}">{{$menu->name}}</a></li>
                                    @elseif($menu->name =="貝果/牛角包")
                                        <li><a style="font-size: 32px;" data-toggle="pill" href="#貝果牛角包">{{$menu->name}}</a></li>
                                    @else
                                        <li><a style="font-size: 32px;" data-toggle="pill" href="#{{$menu->name}}">{{$menu->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach($menus as $menu)
                                    @if($menu->name =="小食")
                                        <div id="{{$menu->name}}" class="tab-pane fade in active">
                                    @elseif($menu->name =="貝果/牛角包")
                                        <div id="貝果牛角包" class="tab-pane fade">
                                    @else
                                        <div id="{{$menu->name}}" class="tab-pane fade">
                                    @endif
                                            <div class="row">
                                                @foreach($productMenus as $productMenu)
                                                    @if($productMenu->menu_id == $menu->id)
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-9">
                                                                    <h2 class="control-label">{{$productMenu->product_name}}</h2>
                                                                </div>
                                                                <div class="col-xs-12 col-md-3">
                                                                    <h2 class="control-label">${{$productMenu->price}}</h2>
                                                                </div>
                                                            </div>
                                                        <input name="{{$productMenu->product_id}}" style="font-size: 34px" class="form-control number-type" type="number" value="0" min="0" max="20" readonly />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                @endforeach
                                        </div>
                                        </div>
                                    <div class="modal-footer">
                                        <input style="font-size: 24px" type="submit" class="btn btn-secondary pull-right" value="確認"/>
                                    </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')

<script>

    $('.number-type').bootstrapNumber();

    $('#orderForm').submit(function () {
        $(this).submit(function() {
            return false;
        });

        var value = $('.number-type').filter(function () {
            return this.value > '0';
        });

        if (value.length == 0) {
            alert('請輸入數量!!');
            return false;
        }

        return true;
    });

    $('#orderAddFoodForm').submit(function () {

        $(this).submit(function() {
            return false;
        });

        var value = $('.number-type').filter(function () {
            return this.value > '0';
        });

        if (value.length == 0) {
            alert('請輸入數量!!');
            return false;
        }

        return true;
    });

    $('.payment').click(function () {
        $('#payment').modal('show')
    });

    $('.open-table').click(function(){
        $('#main-table').html('');
        $('.modal-title').text("桌號"+this.id);
        $('#table_id').val(this.id);
        $.ajax({
            type: 'get',
            url: "getOrderTable?id="+this.id,
            success: function(result){
                $json = JSON.parse(result);
                if(!jQuery.isEmptyObject($json)){
                $html ='';
                    for ($entry in $json) {
                        $html +='<div class="container-fluid"> <div class="row">';
                        $html += ' <div class="col-sm-3"><h2>桌號:</h2></div>';
                        $html += ' <div class="col-sm-3"><h1>'+$json[$entry]['table_id']+'</h1></div>';
                        $html += ' <div class="col-sm-3"><h2>人數:</h2></div>';
                        $html += ' <div class="col-sm-3"><h1>'+$json[$entry]['people']+'</h1></div>';
                        $html += ' <div class="col-sm-3"><h2>數量:</h2></div>';
                        $html += ' <div class="col-sm-3"><h1>'+$json[$entry]['quantity']+'</h1></div>';
                        $html += ' <div class="col-sm-3"><h2>金額:</h2></div>';
                        $html += ' <div class="col-sm-3"><h1>$'+$json[$entry]['price']+'</h1></div>';

                        $html += '</div>' +
                            '<div class="row">\n' +
                            '        <div class="pull-right">\n' +
                            '            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail" data-id='+$json[$entry]['table_id']+'><h3>內容</h3></button>\n' +
                            '            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#payment" data-id='+$json[$entry]['table_id']+'><h3>付款</h3></button>\n' +
                            '        </div>\n' +
                            '    </div>\n' +
                            '</div>\n' +
                            '<hr/>';
                    }
                    $('#main-table').html($html);
                }
            }
        });
    });

    $('#detail').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        $('#detail-title').text("桌號 "+button.data('id'));
        $('#add_food_table_id').val(button.data('id'));
        $('#add_food_title').text("桌號 "+button.data('id'));

        $.ajax({
            type: 'get',
            url: "orderTableDetail?id="+button.data('id'),
            success: function(result){
                $json = JSON.parse(result);
                if(!jQuery.isEmptyObject($json)){

                    $html ='';
                    $html += ' <div class="col-sm-3"><h2>桌號:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['table_id']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>人數:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['quantity']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>數量:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['quantity']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>金額:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>$'+$json['price']+'</h1></div>';
                    $('#detail-table').html($html);

                    $html ='';
                    $html +'  <div class="col-sm-4"><h2>食物</h2></div>\n' +
                    '         <div class="col-sm-4"><h2>數量</h2></div>\n' +
                    '         <div class="col-sm-4"><h2>價錢</h2></div>';

                    for ($entry in $json['0']) {
                        $html += ' <div class="col-sm-4"><h2>'+$json['0'][$entry]['name']+'</h2></div>';
                        $html += ' <div class="col-sm-3"><h2>'+$json['0'][$entry]['sum_quantity']+'</h2></div>';
                        $html += ' <div class="col-sm-4"><h2>$ '+$json['0'][$entry]['sum_price']+'</h2></div>';
                        $html += ' <div class="col-sm-1"><a href="#" class="deleteFood" id="'+$json['0'][$entry]['food_id']+'"><h2>x</h2></a></div>';

                    }
                    $('#detail-food').html($html);
                }
            }
        });


    })

    $('#payment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        $.ajax({
            type: 'get',
            url: "orderTableDetail?id="+button.data('id'),
            success: function(result){
                $json = JSON.parse(result);
                if(!jQuery.isEmptyObject($json)){
                    $('#payment_table_id').val($json['table_id']);
                    $('#payment-title').text("桌號 "+$json['table_id']);
                    $html ='';
                    $html += ' <div class="col-sm-3"><h2>桌號:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['table_id']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>人數:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['quantity']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>數量:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>'+$json['quantity']+'</h1></div>';
                    $html += ' <div class="col-sm-3"><h2>金額:</h2></div>';
                    $html += ' <div class="col-sm-3"><h1>$'+$json['price']+'</h1></div>';
                    $('#payment-table').html($html);
                }
            }
        });
    })

//    $('.deleteFood').click(function(){
//        console.log(this.id);
//    });
//    $(document).ready(function () {
//
//    });
    $('#detail-food').on("click",'.deleteFood',function(){
        console.log(this.id);
    });


    $('#printReceipt').click(function(){
        var table_id = $('#payment_table_id').val();
        $.ajax({
            type: 'get',
            url: "orderTablePrintReceipt?table_id="+table_id,
            success: function(result){
                $json = JSON.parse(result);
                if(!jQuery.isEmptyObject($json)){

                }
            }
        });

    });
</script>
@stop