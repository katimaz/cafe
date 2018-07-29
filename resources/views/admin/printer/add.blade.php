@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Printer</h1>
@stop

@section('content')
    {{--<div class="container">--}}
        <div class="row">

            <div class="col-md-12">
                <form class="form-horizontal" method="post" action="{{url('admin/printer/create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Account:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Account" name="account">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Account Key:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Account Key" name="account_key">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Print Key:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Printer Key" name="printer_key">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Print SN:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Printer SN" name="printer_sn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="printer_type_id" name="printer_type_id">
                                @foreach($printTypes as $printType)
                                    <option value="{{$printType->id}}">{{$printType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" >Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@stop

@section('js')

@stop