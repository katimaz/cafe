@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.product')</h1>
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="row">

        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="{{url('admin/product/create')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.product.name'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-sm-2" for="name">@lang('admin.product.description'):</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input type="text" class="form-control" id="name" placeholder="Enter Description" name="description" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="price">@lang('admin.product.price'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">@lang('admin.product.type')</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="menu_id" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">@lang('admin.product.printer')</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="printer_id" name="printer_id">
                            @foreach($printers as $printer)
                                <option value="{{$printer->id}}">{{$printer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-sm-2" for="image">@lang('admin.product.image'):</label>--}}
                    {{--<div class="col-sm-8">--}}
                        {{--<input name="image" type="file" accept="image/*" onchange="readURL(this)">--}}
                        {{--<br/>--}}
                        {{--<img style="width:300px" id="preview_image"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" >@lang('admin.add')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script type='text/javascript'>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop