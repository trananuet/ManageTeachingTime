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
        <div class="box-top row">
            <br>
            <h3>Khoa, phòng ban</h3>
            <hr>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <span>{{$errors->first('checkbox')}}</span>
                </div>
            @endif 
                <div class="add-btn col-md-2">
                    <button data-toggle="modal" data-target="#modalFaculty" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
                </div>
            <!-- LINE MODAL -->
            <div class="modal fade" id="modalFaculty" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ Excel</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">                                
                                <div class="modal-content" style="width: 100%;">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('faculty.save')}}" id="formFacultyCreate">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Khoa, phòng ban</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tên khoa, phòng ban">
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
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="modal-content" style="width: 100%;">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">Thêm dữ liệu từ excel</h4>
                                    </div>
                                    <form action="{{route('faculty.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                        {{csrf_field()}}
                                        
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label">Import File</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="imported_file"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <b>Trường dữ liệu {name}</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                <div class="btn-group col-md-3" role="group">
                                                    <button class="btn btn-primary" name="import" style="width: 50%;margin-left: 50%;" type="submit">Import</button>
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
        <div class="school-content-table relative">
            <form method="POST" action="{{route('faculty.remove')}}">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                </div>
            <table class="table table-hover table-condensed table-bordered" id="table_training">
                <thead class ="table-school-year">
                    <tr>
                        <th class="stt active-display">STT</th>
                        <th class="">Tên</th>
                        <th class="cus">Tùy chọn</th>
                        <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facultys as $faculty)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td>{{$faculty->name}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditFaculty{{$faculty->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$faculty->id}}" value="{{$faculty->id}}" class="checkbox-remove"></td>
                </form>
                        </tr>
                        <div class="modal fade" id="modalEditFaculty{{$faculty->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('faculty.save')}}" id="formfacultyEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$faculty->id}}">
                                                <div class="form-group row">
                                                    <label for="facultyEdit" class="col-sm-3 col-form-label">Tên</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" id="facultyEdit" placeholder="Tên Khoa, phòng ban" value="{{$faculty->name}}" required>
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
            $('#table_training').dataTable( {
                "autoWidth": false
            });
        });
    </script>
    <script>   
        $(function() {
            $("#formFacultyCreate").validate({
                rules: {
                        name: "required"
                    },
                messages: {
                        name: "Vui lòng điền khoa , phòng ban."
                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        imported_file: "required"
                    },
                messages: {
                        imported_file: "Vui lòng nhập file."
                }
            });
        });
    </script>  
@endsection
