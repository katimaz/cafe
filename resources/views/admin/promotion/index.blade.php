@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Promotion</h1>
@stop

@section('content')
    <a style="margin-bottom: 10px" href="{{url('admin/promotion/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> Add</a>
    <br/>
    <table class="table table-striped table-bordered" id="product-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Sold Out</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr>
                <td>{{$promotion->products_name}}</td>
                <td>{{$promotion->name}}</td>
                <td>{{$promotion->description}}</td>
                <td><img style="height: 80px;width: 80px;" src="{{url('/').'/public/'.$promotion->image_url}}"/></td>
                <td>
                    <a href="{{url('admin/product/modify/'.$promotion->products_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="{{url('admin/product/delete/'.$promotion->products_id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
                "searching":     false
            });
        } );
    </script>
@stop
