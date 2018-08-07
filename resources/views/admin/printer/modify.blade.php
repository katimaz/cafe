@extends('adminlte::page')

@section('title', '御滿屋')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.printer')</h1>
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="row">

        @if(session('success'))
            <div class="alert alert-success alert-block" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{session('success')}}
            </div>
            {{session()->forget('success')}}
        @endif

        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="{{url('admin/printer/modify/'.$printer->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.printer.name'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="@lang('admin.printer.name')" name="name" value="{{$printer->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.printer.account'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="@lang('admin.printer.account')" name="account" value="{{$printer->account}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.printer.accountkey'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="@lang('admin.printer.accountkey')" name="account_key" value="{{$printer->account_key}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.printer.printerkey'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="@lang('admin.printer.printerkey')" name="printer_key" value="{{$printer->printer_key}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.printer.printersn'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="@lang('admin.printer.printersn')" name="printer_sn" value="{{$printer->printer_sn}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">@lang('admin.printer.type')</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="printer_type_id" name="printer_type_id">
                            @foreach($printTypes as $printType)
                                @if($printer->printer_type_id == $printType->id)
                                    <option value="{{$printType->id}}" selected>{{$printType->name}}</option>
                                @else
                                    <option value="{{$printType->id}}">{{$printType->name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" >@lang('admin.edit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        setTimeout(function() {
            $("#success-alert").alert('close');
        }, 2000);
    </script>
@stop