@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Print</h1>
@stop

@section('content')
    <table class="table table-striped table-bordered" id="order-table">
        <thead>
        <tr>
            <th>PrintCode</th>
            <th>Table</th>
            <th>End Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($printCodes as $printCode)
            <tr>
                <td>{{$printCode->code}}</td>
                <td>{{$printCode->table_id}}</td>
                <td>{{$printCode->used_time}}</td>
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
