@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('css')
    <style>
        .table>thead>tr>th {
            vertical-align: inherit;
            text-align: center;
        }
        .table>tbody>tr>td {
            vertical-align: inherit;
            text-align: center;
        }
        .table .text-name{
            text-align: left;
        }
        .toggle{
            width: 100px!important;
            height: 10px!important;
            float: right;
        }
                .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: left;
        }
    </style>
@endsection
@section('content')
@include('base::layouts.manager-left')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="box-top row">
        	<br>
            <h3>Hệ đào tạo</h3>
            <hr>
            <div class="row">
            <div class="alert alert-success">
                Thêm thành công {{count($datas)}} dữ liệu
            </div><br/>

            <div class="school-content-table relative">
            <form method="POST" action="{{route('training.remove')}}">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắc chắn muốn xóa hệ đào tạo đã chọn?');">Xóa</button>
                </div>
            <table class="table table-hover table-condensed table-bordered" id="table_training">
                <thead class ="table-school-year">
                    <tr>
                        <th class="stt active-display">STT</th>
                        <th class="">Tên khóa luận</th>
                        <th class="">Định mức</th>
                        <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td class="text-name">{{$data->name}}</td>
                            <td class="text-name">{{$data->quota}}</td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$data->trainingID}}" value="{{$data->trainingID}}" class="checkbox-remove"></td>
                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a  href="{{route('thesis')}}"><button type="button" class="btn btn-primary">Quay lại </button></a>
    </div>
</div>
        
                   
        </div>
    </div>
</div>


@section('js')
    <script>
        $(document).ready(function() {
            $('#table_training').dataTable( {
                "autoWidth": false
            });
        });
    </script>  
@endsection
