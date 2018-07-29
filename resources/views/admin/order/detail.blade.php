@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>Order</h1>
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="row">

        <div class="col-md-12">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Order ID:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->id.$order->table_id}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Table:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->table_id}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Order Time:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Paid</label>
                    <div class="col-sm-6">
                        @if(!$order->paid)
                            <input id="toggle-checkbox" type="checkbox" data-toggle="toggle" data-size="mini">
                        @else
                            <input id="toggle-checkbox" type="checkbox" data-toggle="toggle" data-size="mini" checked>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach($orderFoods as $orderFood)
                    <a class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{url('/').'/public/'.$orderFood->image_url}}"/>
                            </div>
                            <div class="col-md-6">
                                <h1><strong>{{$orderFood->name}}</strong></h1>
                                <h4>{{$orderFood->description}}</h4>
                                <h5>Quantity : {{$orderFood->sum_quantity}}</h5>
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

        $('#toggle-checkbox').change(function () {
            paid = 0;
            if($(this).prop('checked')){
                paid = 1;
            }
            $.ajax({
                type: 'post',
                data: {paid : paid, _token: '{{csrf_token()}}'},
                url: '/admin/order/detail/{{$order->id}}',
                success: function(data) {
                    console.log(data);
                },
            });
        })
    </script>
@stop