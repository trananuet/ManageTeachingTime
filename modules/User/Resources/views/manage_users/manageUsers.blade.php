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
                        <h3>Quản lý người dùng</h3>
                        <hr><br/>
                    </div>  
                </div>  
            </div>
            <div class="content-manage-system">
                <table class="table table-hover table-condensed table-bordered" id="table-manage-system">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt">STT</th>
                            <th class="">Người dùng</th>
                            <th class="">Email</th>
                            <th class="">Chức vụ</th>
                            <th class="cus">Tùy chọn</th>
                        </tr>
                    </thead>
                    @foreach($cust as $user)
                    <tbody>
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalManageSystem{{$user->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalManageSystem{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ NGƯỜI DÙNG</h4>
                                        </div>
                                        <form method="POST" action="{{route('manage_system.save')}}" id="formSystemSave">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Phân Quyền: </h4>
                                                    <div class="system-function col-md-offset-3">
                                                    
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" id="inlineCheckbox1" value="0" checked> Admin
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" id="inlineCheckbox2" value="1"> PĐT
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" id="inlineCheckbox3" value="2"> Khách
                                                                </label>
                                                            </div>
                                                            <label></label>
                                                        </div>
                                                    <input type="hidden" name="id_role" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button type="submit" id="saveImage" class="btn btn-primary btn-hover-green" data-action="save" role="button" style="width: 50%;margin-left: 50%;">Lưu</button>
                                                    </div>
                                                    <div class="btn-group col-md-3" role="group">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button" style="width: 50%;margin-right: 50%;">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </tbody>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-manage-system').dataTable( {
            "autoWidth": false
            });
        } );
    </script>
@endsection