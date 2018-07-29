@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>Menu</h1>
@stop

@section('content')
    {{--<div class="container">--}}
        <div class="row">

            <div class="col-md-12">
                <form class="form-horizontal" method="post" action="{{url('admin/menu/create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="image">Image:</label>
                        <div class="col-sm-8">
                            <input name="image" type="file" accept="image/*" onchange="readURL(this)">
                            <br/>
                            <img id="preview_image" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="image_menu">Menu Image:</label>
                        <div class="col-sm-8">
                            <input name="image_menu" type="file" accept="image/*" onchange="readImage_menuURL(this)">
                            <br/>
                            <img id="preview_image_menu"/>
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

    function readImage_menuURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function (e) {
                $('#preview_image_menu').attr('src', e.target.result);
                };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop