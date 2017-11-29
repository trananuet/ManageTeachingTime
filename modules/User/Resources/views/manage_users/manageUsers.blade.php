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
                        
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 add-btn">
                                <button data-toggle="modal" data-target="#modalAddUser" class="btn btn-primary">+ <b>THÊM</b></button>
                            </div>
                        </div>
                        <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                                                        
                                        <div class="modal-content" style="width: 100%;">
                                            <div class="modal-header" style="background: #56aaff">
                                                <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="lineModalLabel">THÊM NGƯỜI DÙNG</h4>
                                            </div>
                                            <form method="POST" action="{{route('manage_users.add')}}" id="AddUser" >
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Tên: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Name" class="form-control" id="schoolYearCreate" placeholder="Nguyễn Chiến Công">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Email: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Email" class="form-control" id="schoolYearCreate" placeholder="hyperyuiz@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Mật khẩu: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Password" class="form-control" id="schoolYearCreate" placeholder="123456">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Chức vụ: </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="Role">
                                                                <option>Chọn chức vụ</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{!! $role->role !!}</option>
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
                </div>
                <hr/>
            </div>

            <div class="content-manage-system">
                <table class="table table-hover table-condensed table-bordered" id="table-manage-system">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt">STT</th>
                            <th class="">Người dùng </th>
                            <th class="">Email</th>
                            <th class="">Chức vụ</th>
                            <th class="">Tùy chọn</th>
                            <th>Phân quyền</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser{{$user->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                                
                                <a href="{{route('manage_users.delete',['userID' => $user->id])}}"><button class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalManageSystem{{$user->id}}">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEditUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                                                        
                                        <div class="modal-content" style="width: 100%;">
                                            <div class="modal-header" style="background: #56aaff">
                                                <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA NGƯỜI DÙNG</h4>
                                            </div>
                                            <form method="POST" action="{{route('manage_users.edit',['userID' => $user->id])}}" >
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Tên: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Name" class="form-control" id="schoolYearCreate" value="{{$user->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Email: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Email" class="form-control" id="schoolYearCreate" value="{{$user->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Mật khẩu: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="Password" class="form-control" id="schoolYearCreate" placeholder="123456">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-3 col-form-label">Chức vụ: </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="Role">
                                                                <option>Chọn chức vụ</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{!! $role->role !!}</option>
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

                        <div class="modal fade" id="modalManageSystem{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">PHÂN CHỨC VỤ</h4>
                                        </div>
                                        <form method="POST" action="{{route('manage_users.save',['userID' => $user->id])}}">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-4 col-form-label">Chức Vụ Đang Có: </label>
                                                        <div class="col-sm-8">
                                                            <span>{!! $user->role !!}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="schoolYearCreate" class="col-sm-4 col-form-label">Phân Lại Chức vụ: </label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="role">
                                                                <option>Chọn chức vụ</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{!! $role->role !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
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
    <script>   
        $(function() {
            $("#AddUser").validate({
                rules: {
                        Name: "required", 
                        Email: {
                            required : true,
                            email : true
                        },
                        Password: "required"
                    },
                messages: {
                        Name: "Vui lòng điền tên.",
                        Email: { 
                            required: "Vui lòng điền email",
                            email : " Vui lòng điền đúng định dạng email"
                        },
                        Password: "Vui lòng điền Password"
                }
            });
        });
    </script>
@endsection