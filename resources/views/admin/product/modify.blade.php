@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>@lang('admin.product')</h1>
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
            <form class="form-horizontal" method="post" action="{{url('admin/product/modify/'.$product->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.product.name'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$product->name}}">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-sm-2" for="name">@lang('admin.product.description'):</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control" id="name" placeholder="Enter Description" name="description" value="{{$product->description}}">--}}
                        {{--<input id="active" type="hidden" name="active" value="{{$product->active}}">--}}
                        {{--<input id="takeAway" type="hidden" name="takeAway" value="{{$product->take_away}}">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.product.price'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{$product->price}}">
                        <input id="active" type="hidden" name="active" value="{{$product->active}}">
                        <input id="takeAway" type="hidden" name="takeAway" value="{{$product->take_away}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">@lang('admin.product.type')</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="menu_id" name="menu_id">
                            @foreach($menus as $menu)
                                @if($product->menu_id == $menu->id)
                                    <option value="{{$menu->id}}" selected>{{$menu->name}}</option>
                                @else
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-sm-2">@lang('admin.product.printer')</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<select class="form-control" id="printer_id" name="printer_id">--}}
                            {{--@foreach($printers as $printer)--}}
                                {{--@if($product->printer_id == $printer->id)--}}
                                    {{--<option value="{{$printer->id}}" selected>{{$printer->name}}</option>--}}
                                {{--@else--}}
                                    {{--<option value="{{$printer->id}}">{{$printer->name}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type='text/javascript'>
        $('#toggle-checkbox').change(function() {
            if($(this).prop('checked')){
                $('#active').val("0");
            }else{
                $('#active').val("1");
            }
        });
        $('#takeaway-checkbox').change(function() {
            if($(this).prop('checked')){
                $('#takeAway').val("1");
            }else{
                $('#takeAway').val("0");
            }
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        setTimeout(function() {
            $("#success-alert").alert('close');
        }, 2000);
    </script>
@stop