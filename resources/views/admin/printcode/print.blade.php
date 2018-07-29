@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')
<style>
    .a-button{
        height: 100px;
    }
</style>
@stop

@section('content_header')
    <h1>Print</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><a class="btn btn-primary a-button" href="{{route('getPrint',['count' => '1'])}}"><h1>Print 1 Key</h1></a></div>
            <div class="col-sm-4"><a class="btn btn-success a-button" href="{{route('getPrint',['count' => '10'])}}"><h1>Print 10 Key</h1></a></div>
            <div class="col-sm-4"><a class="btn btn-danger a-button" href="{{route('getPrint',['count' => '20'])}}"><h1>Print 20 Key</h1></a></div>
        </div>
    </div>
@stop

@section('js')

@stop
