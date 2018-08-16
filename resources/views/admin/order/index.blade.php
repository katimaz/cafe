@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.order')</h1>
@stop

@section('content')
    <a href="{{url('admin/downloadExcel')}}" class="btn btn-info pull-right">匯出EXCEL</a>
    <br/>
    <table class="table table-striped table-bordered" id="order-table">
        <thead>
        <tr>
            <th>@lang('admin.order.createdtime')</th>
            <th>@lang('admin.order.orderid')</th>
            <th>@lang('admin.order.tableid')</th>
            <th>@lang('admin.order.quantity')</th>
            <th>@lang('admin.order.people')</th>
            <th>@lang('admin.order.payment')</th>
            {{--<th>@lang('admin.order.paidstatus')</th>--}}
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->created_at}}</td>
                <td>{{$order->id.$order->table_id}}</td>
                <td>{{$order->table_id}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->people}}</td>
                @if($order->payment_type == 1)
                    <td>現金</td>
                @elseif($order->payment_type == 2)
                    <td>信用卡</td>
                @elseif($order->payment_type == 3)
                    <td>八達通</td>
                @endif
                {{--@if($order->paid)--}}
                    {{--<td>@lang('admin.order.paid')</td>--}}
                {{--@else--}}
                    {{--<td>@lang('admin.order.unpaid')</td>--}}
                {{--@endif--}}

                <td>
                    <a href="{{url('admin/order/detail/'.$order->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('admin.detail')</a>
                    {{--<a href="#" id="{{$order->id}}" class="btn btn-xs btn-info payment"><i class="glyphicon glyphicon-edit"></i> 付款</a>--}}
                    {{--<a href="{{url('admin/order/delete/'.$order->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#order-table').DataTable({
                "searching":     false,
                "language": {
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first":    "第一頁",
                        "previous": "上一頁",
                        "next":     "下一頁",
                        "last":     "最後一頁"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            });

            $('.payment').click(function () {
                var id = this.id;
                paid = 1;
                $.ajax({
                    type: 'post',
                    data: {paid : paid, _token: '{{csrf_token()}}'},
                    url: '/admin/order/detail/'+id,
                    success: function(data) {
                        location.reload();
                    },
                });
            })



            $('#print').click(function () {
                var table_id = $( "#table_id" ).val();
                var people = $( "#people" ).val();

                if(!isNaN(people)){
                    if(table_id && people){
                        $('#print').prop('disabled', true);
                        $.ajax({
                            data: {table_id : table_id,people : people},
                            url: '/printKey',
                            success: function(data) {
                                console.log(data);
                                if(data =="SUCCESS"){
                                    location.reload();
                                }
                            },
                        });
                    }else{
                        alert("請輸入桌號/人數");
                    }
                }else{
                    alert("請輸入正常人數");
                }
            });
        } );
    </script>
@stop
