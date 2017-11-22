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
        <div class="row">
            <div class="box-top row">
                <div class="col-md-12">
                    <div class="form-group">
                        <hr>
                        <h3>View Excel</h3>
                        <hr><br/>
                        <div class="alert alert-danger">Import thành công {{count($dataArray)}} dữ liệu</div>
                        <hr/>
                        <a href="{{route('school_year')}}"><button type="button" class="btn btn-primary" style="width: 10%;">Trở về</button></a>
                    </div>
                </div>
                <hr/>
            </div>
        </div>
    </div>
</div>
@endsection
