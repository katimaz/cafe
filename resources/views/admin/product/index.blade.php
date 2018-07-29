@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
    <a style="margin-bottom: 10px" href="{{url('admin/product/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> Add</a>
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
        @foreach($products as $product)
            <tr>
                <td>{{$product->products_name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                @if(!$product->active)
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif
                <td><img style="height: 80px;width: 80px;" src="{{url('/').'/public/'.$product->products_image_url}}"/></td>
                <td>
                    <a href="{{url('admin/product/modify/'.$product->products_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="{{url('admin/product/delete/'.$product->products_id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
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
