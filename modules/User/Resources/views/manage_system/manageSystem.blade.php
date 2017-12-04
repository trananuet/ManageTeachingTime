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
</style>
@endsection
@section('content')
@include('base::layouts.manager-left')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="box-top row">
            <h3>Quản lý vai trò</h3>
            <hr>
            <div class="row">
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <strong>{{$errors->first('checkbox')}}</strong>
                    </div>
                @endif  
            </div>
            <div class="col-md-4 add-btn">
                <button data-toggle="modal" data-target="#modalAccess" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
            <div class="modal fade" id="modalAccess" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                        </div>
                        <form method="POST" action="{{route('manage_system.save')}}" id="formSystemSave">
                        {{ csrf_field() }}
                            <div class="modal-body">
                                <!-- content goes here -->
                                <input type="hidden" name="id" value="">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Vai trò: </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="role" class="form-control" id="" placeholder="Vai trò">
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
        </div>
        <div class="content-manage-system">
            <form method="POST" action="{{route('manage_system.remove')}}" id="formRemoveAccess">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn vai trò này?');">Xóa</button>
                </div>
                <table class="table table-hover table-condensed table-bordered" id="table-manage-system">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt">STT</th>
                            <th class="">Quyền hê thống</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td class="text-name">{{$role->role}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAccess{{$role->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class="hidden-checkbox"><input type="checkbox" name="checkbox[]" id="" value="{{$role->id}}" class="checkbox-remove"></td>
                        </tr>
            </form>
                        <div class="modal fade" id="modalAccess{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                                        </div>
                                        <form method="POST" action="{{route('manage_system.save')}}" id="formSystemSave">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$role->id}}">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Quyền truy cập: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="role" class="form-control" id="" placeholder="Quyền truy cập" value="{{$role->role}}" required>
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
                        @endforeach
                    </tbody>
                </table>
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
        });
    </script>
    <script>   
        $(function() {
            $("#formSystemSave").validate({
                rules: {
                    role: "required"
                    },
                messages: {
                    role: "Vui lòng điền vai trò."
                }
            });
        });
    </script>
@endsection