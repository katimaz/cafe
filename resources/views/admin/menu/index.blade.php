@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Menu</h1>
@stop

@section('content')
    <a style="margin-bottom: 10px" href="{{url('admin/menu/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> Add</a>
    <table class="table table-striped table-bordered" id="menus-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Menu Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{$menu->name}}</td>
                <td><img style="height: 80px;width: 80px;" src="{{url('/').'/public/'.$menu->image_url}}"/></td>
                <td><img style="height: 60px;width: 100px;" src="{{url('/').'/public/'.$menu->image_menu_url}}"/></td>
                <td>
                    <a href="{{url('admin/menu/modify/'.$menu->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="{{url('admin/menu/delete/'.$menu->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#menus-table').DataTable({
                "searching":     false
            });
        } );
    </script>
@stop
