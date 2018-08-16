@extends('adminlte::page')

@section('title', 'Cafe')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.users')</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-block" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('success')}}
        </div>
        {{session()->forget('success')}}
    @endif
    <a style="margin-bottom: 10px" href="{{url('admin/user/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> @lang('admin.add')</a>
    <table class="table table-striped table-bordered" id="menus-table">
        <thead>
        <tr>
            <th>@lang('admin.menu.name')</th>
            {{--<th>Image</th>--}}
            {{--<th>Menu Image</th>--}}
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                {{--<td><img style="height: 80px;width: 80px;" src="{{url('/').'/public/'.$menu->image_url}}"/></td>--}}
                {{--<td><img style="height: 60px;width: 100px;" src="{{url('/').'/public/'.$menu->image_menu_url}}"/></td>--}}
                <td>
                    <a href="{{url('admin/user/modify/'.$user->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('admin.edit')</a>
                    <a href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> @lang('admin.delete')</a>
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
                "searching":     false,
                "language": {
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first":    "第一頁",
                        "previous": "上一頁",
                        "next":     "下一頁",
                        "last":     "最後一頁"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            });
        } );

        setTimeout(function() {
            $("#success-alert").alert('close');
        }, 2000);
    </script>
@stop
