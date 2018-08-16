@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>@lang('admin.order')</h1>
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="row">

        <div class="col-md-12">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.order.orderid'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->id.$order->table_id}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.order.tableid'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->table_id}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.order.createdtime')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.order.updatedtime')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->updated_at}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.order.payment')</label>
                    <div class="col-sm-8">
                        @if($order->payment_type== 1 )
                            <input type="text" class="form-control" value="現金" disabled>
                        @elseif($order->payment_type==2)
                            <input type="text" class="form-control" value="信用卡" disabled>
                        @elseif($order->payment_type==3)
                            <input type="text" class="form-control" value="八達通" disabled>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">@lang('admin.order.paidstatus')</label>
                    <div class="col-sm-6">
                        @if(!$order->paid)
                            <input id="toggle-checkbox" type="checkbox" data-toggle="toggle" data-size="mini" disabled>
                        @else
                            <input id="toggle-checkbox" type="checkbox" data-toggle="toggle" data-size="mini" checked disabled>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                <a class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xs-6">
                            <h1><strong>合計:</strong></h1>
                        </div>
                        <div class="col-xs-6">
                            {{--<h2>Quantity : {{$order->quantity}}</h2>--}}
                            <h2>${{$order->price}}</h2>
                        </div>
                    </div>
                </a>
                @foreach($orderFoods as $orderFood)
                    <a class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-xs-6">
                                <h1><strong>{{$orderFood->name}}</strong></h1>
                            </div>
                            <div class="col-xs-6">
                                <h2>數量 : {{$orderFood->sum_quantity}}</h2>
                                <h2>價錢 : ${{$orderFood->sum_price}}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>


        </div>
    </div>
@stop

@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type='text/javascript'>

        {{--$('#toggle-checkbox').change(function () {--}}
            {{--paid = 0;--}}
            {{--if($(this).prop('checked')){--}}
                {{--paid = 1;--}}
            {{--}--}}
            {{--$.ajax({--}}
                {{--type: 'post',--}}
                {{--data: {paid : paid, _token: '{{csrf_token()}}'},--}}
                {{--url: '/admin/order/detail/{{$order->id}}',--}}
                {{--success: function(data) {--}}
                    {{--console.log(data);--}}
                {{--},--}}
            {{--});--}}
        {{--})--}}
    </script>
@stop