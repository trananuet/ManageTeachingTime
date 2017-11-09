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
        .set-access-modal{
            background: #eeebf1;
        }
    </style>
@endsection
@section('content')
@include('base::layouts.manager-left')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="school-top row">
                <div class="col-md-3">
                    <div class="form-group">
                        <hr/>
                        <label><h3>Năm học</h3></label>
                        <select class="form-control">
                            <option>Chọn năm học</option>
                        </select>
                    </div>
                </div>
                <hr/>
                <div class="col-md-offset-3 col-md-6">
                    <input type="text" placeholder="Tìm kiếm" class="form-control search-year">
                </div>
            </div>
            <div class="school-content-table">
                <table class="table table-hover table-condensed table-bordered ">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="">#</th>
                            <th class="">Năm học</th>
                            <th class="">Sửa</th>
                            <th class="">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @foreach($school_years as $schoolyear)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$schoolyear->name}}</td>
                                <td><a href=""><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
                                <td><input type="checkbox"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#school-years').DataTable();
    } );
</script>
@endsection
