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
            <div class="box-top row">
                <h3>Giảng viên khóa luận</h3>
                <hr>
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <span>{{$errors->first('checkbox')}}</span>
                    </div>
                @endif 
                <div class="col-md-4 add-btn1">
                    <button data-toggle="modal" data-target="#modalThesisLecturer" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
                </div>
                <!-- LINE MODAL -->
                <div class="modal fade" id="modalThesisLecturer" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">                                
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('thesis_lecturer.save')}}" id="formThesisLecturerCreate">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Giảng viên </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="teacherID" style="color: #000;">
                                                            <option value="">Chọn giảng viên</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Khóa luận </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="khoa_luan" class="form-control" id="" placeholder="Khóa luận">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Luận văn </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="luan_van" class="form-control" id="" placeholder="Luận văn">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Luận án </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="luan_an" class="form-control" id="" placeholder="Luận án">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Niên luận </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nien_luan" class="form-control" id="" placeholder="Niên luận">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Số lượng</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="sum_thesis" class="form-control" id="" placeholder="Số lượng">
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
            <div class="content-table relative">
                <form method="POST" action="{{route('thesis_lecturer.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Giảng viên</th>
                            <th class="">Khóa luận</th>
                            <th class="">Luận văn</th>
                            <th class="">Luận án</th>
                            <th class="">Niên luận</th>
                            <th class="">Số lượng</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thesis_lecturers as $thesis_lecturer)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td>{{$thesis_lecturer->teacherName}}</td>
                            <td>{{$thesis_lecturer->khoa_luan}}</td>
                            <td>{{$thesis_lecturer->luan_van}}</td>
                            <td>{{$thesis_lecturer->luan_an}}</td>
                            <td>{{$thesis_lecturer->nien_luan}}</td>
                            <td>{{$thesis_lecturer->sum_thesis}}</td>
                            <td>
                               	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditThesisLecturer{{$thesis_lecturer->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$thesis_lecturer->id}}" value="{{$thesis_lecturer->id}}" class="checkbox-remove"></td>
                </form>
                        </tr>
                        	<div class="modal fade" id="modalEditThesisLecturer{{$thesis_lecturer->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('thesis_lecturer.save')}}" id="formThesisLecturerEdit">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$thesis_lecturer->id}}">
                                                <div class="form-group row">
                                                   	<label for="" class="col-sm-3 col-form-label">Giảng viên</label>
                                                   	<div class="col-sm-9">
                                                        <select type="text" name="teacherID" class="form-control" id="" required>
                                                        	<option value="">Chọn giảng viên</option>
                                                            @foreach($teachers as $teacher)
                                                                @php
                                                                    $selectTeacher = $teacher->id == $thesis_lecturer->teacherID ? "selected" : null;
                                                                @endphp
                                                            <option value="{{$teacher->id}}" {{$selectTeacher}}>{{$teacher->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Khóa luận </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="khoa_luan" class="form-control" id="" placeholder="Khóa luận" value="{{$thesis_lecturer->khoa_luan}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Luận văn </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="luan_van" class="form-control" id="" placeholder="Luận văn" value="{{$thesis_lecturer->luan_van}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Luận án </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="luan_an" class="form-control" id="" placeholder="Luận án" value="{{$thesis_lecturer->luan_an}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Niên Luận </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nien_luan" class="form-control" id="" placeholder="Niên Luận" value="{{$thesis_lecturer->nien_luan}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ThesisLecturerEdit" class="col-sm-3 col-form-label">Số lượng</label>
                                                    <div class="col-sm-9">
                                                            <input type="text" name="sum_thesis" class="form-control" id="ThesisLecturerEdit" placeholder="Số lượng" value="{{$thesis_lecturer->sum_thesis}}" required>
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
            $("#formThesisLecturerCreate").validate({
                rules: {
                        trainingID: "required", 
                        teacherID: "required",
                        thesisID: "required",
                        number: "required"
                    },
                messages: {
                        trainingID: "Vui lòng chọn hệ đào tạo.",
                        teacherID: "Vui lòng chọn giảng viên.",
                        thesisID: "Vui lòng chọn khóa luận.",
                        number: "Vui lòng điền số lượng."
                }
            });
        });
    </script> 
@endsection
