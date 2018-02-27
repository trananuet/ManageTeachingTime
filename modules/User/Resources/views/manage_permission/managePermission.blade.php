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
    /*.select2-container  {
        width: 100%!important;
    }
    .select2-container input{
        width: 100%!important;
    }*/
    .ms-parent {
        height: 34px;
        padding: 0px 0px;
    }   
    .ms-choice {
        height: 34px;
        padding: 0px 0px;
    }
    .ms-choice div {
        background: url("{{asset('/node_modules/multiselect/multiple-select.png')}}") left top no-repeat;
    }
    .ms-choice div.open {
        background: url("{{asset('/node_modules/multiselect/multiple-select.png')}}") right top no-repeat;
    }
</style>
@endsection
@section('content')
@include('base::layouts.manager-left')
            <h3>Quản Lý Phân Quyền</h3>
            <hr>
            <div class="row">
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <strong>{{$errors->first('checkbox')}}</strong>
                    </div>
                @endif  
            </div>
            <div class="col-md-4 add-btn">
                <button data-toggle="modal" data-target="#modalPermission" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
            <div class="modal fade" id="modalPermission" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                        </div>
                        <form method="POST" action="{{route('manage_permission.save')}}" id="formPermissionCreate">
                        {{ csrf_field() }}
                            <div class="modal-body">
                                <!-- content goes here -->
                                <input type="hidden" name="id" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Vai trò: </label>
                                        <select class="form-control" name="role_id" >
                                            <option>Chọn vai trò</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Chức năng: </label>
                                        <select name="function_id[]" id="select-function" class="form-control" multiple="multiple">
                                            @foreach($functions as $function)
                                                <option value="{{$function->id}}">{{$function->name_function}}</option>
                                            @endforeach
                                        </select>
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
        <div class="content-manage-system">
            <form method="POST" action="{{route('manage_permission.remove')}}" id="formRemovePermission">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắc chắn muốn chức năng đã chọn?');">Xóa</button>
                </div>
                <table class="table table-hover table-condensed table-bordered" id="table-manage-system">
                    <thead class ="table-school-year">
                        <tr>
                            {{--  <th class="stt">STT</th>  --}}
                            <th class="">Vai trò</th>
                            <th class="">Chức năng</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role_functions as $role_function)
                        <tr>
                            {{--  <td>{{++$loop->index}}</td>  --}}
                            <td class="text-name">{{$role_function->role}}</td>
                            <td class="text-name">{{$role_function->function}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPermission{{$role_function->rol_fuct_id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class="hidden-checkbox"><input type="checkbox" name="checkbox[]" id="" value="{{$role_function->rol_fuct_id}}" class="checkbox-remove"></td>
                        </tr>
            </form>
                        <div class="modal fade" id="modalPermission{{$role_function->rol_fuct_id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                                    </div>
                                    <form method="POST" action="{{route('manage_permission.save')}}" id="">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <input type="hidden" name="id" value="{{$role_function->rol_fuct_id}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="col-form-label">Vai trò: </label>
                                                    <select class="form-control" name="role_id" >
                                                        <option>Chọn vai trò</option>
                                                        @foreach($roles as $role)
                                                            @php
                                                                $select = $role->role == $role_function->role ? "selected" : null;
                                                            @endphp
                                                            <option value="{{$role->id}}" {{$select}}>{{$role->role}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="col-form-label">Chức năng: </label>
                                                    <select name="function_id" class="form-control">
                                                        @foreach($functions as $function)
                                                            @php
                                                                $selectFunction = $function->name_function == $role_function->function ? "selected" : null;
                                                            @endphp 
                                                            <option value="{{$function->id}}" {{$selectFunction}}>{{$function->name_function}}</option>
                                                        @endforeach
                                                    </select>                                                        
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
        <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-manage-system').dataTable( {
            "autoWidth": false,
            "ordering" : false,
            });
        } );
    </script>
    <script>   
        $(function() {
            $("#formFunctionsCreate").validate({
                rules: {
                    functions: "required"
                    },
                messages: {
                    functions: "Vui lòng điền chức năng."
                }
            });
        });
    </script>
    <script>
        /*$(".select-function").select2({
            placeholder: "Chọn chức năng"
        });*/
        $("#select-function").multipleSelect({
            filter: true,
            placeholder: "Chọn chức năng"
        });
    </script>
@endsection