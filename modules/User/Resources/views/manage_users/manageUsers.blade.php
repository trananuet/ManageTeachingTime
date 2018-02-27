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
<div class="right_col" role="main">
    <div class="page-title">
         <div class="row">
            <div class="box-top row">
            <br>
            <h3>Quản Lý Người Dùng</h3>
            <hr>
            <div class="row">
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <strong>{{$errors->first('checkbox')}}</strong>
                    </div>
                @endif  
            </div>
            <div class="col-md-4 add-btn">
                <button data-toggle="modal" data-target="#modalUser" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
        </div>
            <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="modal-content" style="width: 100%;">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                                </div>
                                <form method="POST" action="{{route('manage_users.save')}}" id="createFormUser" >
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <!-- content goes here -->
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Tên: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Tên người dùng">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email: </label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-3 col-form-label">Mật khẩu: </label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-3 col-form-label">Nhập lại mật khẩu: </label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Nhập lại mật khẩu">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for=" " class="col-sm-3 col-form-label">Vai trò: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="role_id" >
                                                    <option>Chọn vai trò</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->role}}</option>
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
                </div>
            </div>           
        </div>
        <div class="content-manage-system">
            <form method="POST" action="{{route('manage_users.remove')}}" id="editFormUser">
            {{ csrf_field() }}
            <div class="box-remove-all">
                <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắc chắn xóa muốn người dùng này?');">Xóa</button>
            </div>
            <table class="table table-hover table-condensed table-bordered" id="table-manage-system">
                <thead class ="table-school-year">
                    <tr>
                        <th class="stt">STT</th>
                        <th class="">Người dùng </th>
                        <th class="">Email</th>
                        <th class="">Chức vụ</th>
                        <th class="">Tùy chọn</th>
                        <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td class="text-name">{{$user->name}}</td>
                        <td class="text-name">{{$user->email}}</td>
                        <td class="text-name">{{$user->role}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser{{$user->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td class="hidden-checkbox"><input type="checkbox" name="checkbox[]" id="" value="{{$user->id}}" class="checkbox-remove"></td>
                    </tr>
            </form>
                    <div class="modal fade" id="modalEditUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ HỆ THỐNG</h4>
                                        </div>
                                        <form method="POST" action="{{route('manage_users.save')}}" id="AddUser" >
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Tên: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Tên người dùng" value="{{$user->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-3 col-form-label">Email: </label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-3 col-form-label">Mật khẩu: </label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-sm-3 col-form-label">Nhập lại mật khẩu: </label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Nhập lại password">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Vai trò: </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="role_id">
                                                            <option value="">Chọn vai trò</option>
                                                            @foreach($roles as $role)
                                                                @php
                                                                    $select = $user->role == $role->role ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$role->id}}" {{$select}}>{{$role->role}}</option>
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
            $('#table-manage-system').dataTable({
            "autoWidth": false
            });
        });
    </script>
    <script>   
        $(function() {
            $("#createFormUser").validate({
                rules: {
                        name: "required", 
                        email: {
                            required : true,
                            email : true
                        },
                        password: "required",
                        password_confirmation: "required"
                    },
                messages: {
                        name: "Vui lòng điền tên.",
                        email: { 
                            required: "Vui lòng điền email",
                            email : " Vui lòng điền đúng định dạng email"
                        },
                        password: "Vui lòng điền Password",
                        password_confirmation: "Nhập lại mật khẩu"
                        
                }
            });
        });
    </script> 
@endsection