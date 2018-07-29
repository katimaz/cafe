@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Printer</h1>
@stop

@section('content')
    <a style="margin-bottom: 10px" href="{{url('admin/printer/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> Add</a>
    <br/>
    <table class="table table-striped table-bordered" id="product-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Account</th>
            <th>Key</th>
            <th>Printer SN</th>
            <th>Printer Key</th>
            <th>Printer Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($printers as $printer)
            <tr>
                <td>{{$printer->printer_name}}</td>
                <td>{{$printer->account}}</td>
                <td>{{$printer->account_key}}</td>
                <td>{{$printer->printer_sn}}</td>
                <td>{{$printer->printer_key}}</td>
                <td>{{$printer->name}}</td>
                <td>
                    <a href="{{url('admin/printer/modify/'.$printer->printer_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="{{url('admin/printer/delete/'.$printer->printer_id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
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
