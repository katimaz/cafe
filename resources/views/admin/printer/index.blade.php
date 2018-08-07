@extends('adminlte::page')

@section('title', '御滿屋')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.printer')</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-block" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('success')}}
        </div>
        {{session()->forget('success')}}
    @endif

    <a style="margin-bottom: 10px" href="{{url('admin/printer/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> @lang('admin.add')</a>
    <br/>
    <table class="table table-striped table-bordered" id="product-table">
        <thead>
        <tr>
            <th>@lang('admin.printer.name')</th>
            <th>@lang('admin.printer.account')</th>
            <th>@lang('admin.printer.accountkey')</th>
            <th>@lang('admin.printer.printerkey')</th>
            <th>@lang('admin.printer.printersn')</th>
            <th>@lang('admin.printer.type')</th>
            <th></th>
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
                    <a href="{{url('admin/printer/modify/'.$printer->printer_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('admin.edit')</a>
                    <a href="{{url('admin/printer/delete/'.$printer->printer_id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> @lang('admin.delete')</a>
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
    </script>
@stop
