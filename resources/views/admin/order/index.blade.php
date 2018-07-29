@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
    <table class="table table-striped table-bordered" id="order-table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Table</th>
            <th>Quantity</th>
            <th>Paid</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id.$order->table_id}}</td>
                <td>{{$order->table_id}}</td>
                <td>{{$order->quantity}}</td>
                @if($order->paid)
                    <td>Paid</td>
                @else
                    <td>Not Paid</td>
                @endif

                <td>
                    <a href="{{url('admin/order/detail/'.$order->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Detail</a>
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
                "searching":     false
            });
        } );
    </script>
@stop
