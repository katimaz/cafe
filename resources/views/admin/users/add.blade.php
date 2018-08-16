@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.users')</h1>
@stop

@section('content')
    @if(session('danger'))
        <div class="alert alert-danger alert-block" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('danger')}}
        </div>
        {{session()->forget('danger')}}
    @endif
    <div class="row">

        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="{{url('admin/user/create')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.users.name'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="請輸入帳號" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">@lang('admin.users.password'):</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="請輸入密碼" name="password">
                        <input type="hidden" class="form-control" id="role_id" name="role_id" value="2">
                    </div>
                </div>
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