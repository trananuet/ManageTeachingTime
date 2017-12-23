@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('css')
    <style>
        .table>thead>tr>th {
            vertical-align: inherit;
            text-align: left;
        }
        .table>tbody>tr>td {
            vertical-align: inherit;
            text-align: left;
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
                <h3>Giảng viên môn học</h3>
                <hr>
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <span>{{$errors->first('checkbox')}}</span>
                    </div>
                @endif 
                <div class="col-md-4 add-btn1">
                        <button data-toggle="modal" data-target="#modalCourseLecturer" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
                </div>
                <!-- LINE MODAL -->
                <div class="modal fade" id="modalCourseLecturer" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

                    <div class="modal-dialog">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                                                            
                            <div class="modal-content" style="width: 100%;">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                </div>
                                <form method="POST" action="{{route('course_lecturer.save')}}" id="formCourseLecturerCreate">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="semester" style="color: #000;">
                                                            <option value="">Chọn học kỳ</option>
                                                            @foreach($semesters as $semester)
                                                                <option value="{{$semester->semesterID}}">{{$semester->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Năm học </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="school_year" style="color: #000;">
                                                            <option value="">Chọn năm học</option>
                                                            @foreach($school_years as $school_year)
                                                                <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Tên giảng viên </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="teacher" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Môn học </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="course" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Số sinh viên</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="number_of_student" class="form-control" id="" placeholder="">
                                                    </div>

                                                    <label for="" class="col-sm-3 col-form-label">Giờ lý thuyết</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="hour_theory" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Giờ thực hành</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="practice_hours" class="form-control" id="" placeholder="">
                                                    </div>

                                                    <label for="" class="col-sm-3 col-form-label">Giờ tự học</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="learning_time" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>  
                                                 
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Trong giờ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="in_hours" class="form-control" id="" placeholder="">
                                                    </div>
                                                    <label for="" class="col-sm-3 col-form-label">Ngoài giờ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="overtime" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Ngày nghỉ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="day_off" class="form-control" id="" placeholder="">
                                                    </div>

                                                    <label for="" class="col-sm-3 col-form-label">Giờ quy đổi</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="converted_hours" class="form-control" id="" placeholder="">
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
                                <form action="{{route('course_lecturer.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="semester" style="color: #000;">
                                                    <option value="">Chọn học kỳ</option>
                                                        @foreach($semesters as $semester)
                                                        <option value="{{$semester->semesterID}}">{{$semester->name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=" " class="col-sm-3 col-form-label">Năm học </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="school_year" style="color: #000;">
                                                        <option value="">Chọn năm học</option>
                                                        @foreach($school_years as $school_year)
                                                            <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Import File</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="imported_file"/>
                                            </div>
                                </div>
                                <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Trường dữ liệu</label>
                                            <div class="col-sm-9">
                                                <b> {tengiaovien,tenmonhoc,sosinhvien,giolythuyet,<br/>giothuchanh,giotuhoc,tronggio,ngoaigio,ngaynghi,quydoi}</b>
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
                            </div>

                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="school-content-table1 relative">
                <form method="POST" action="{{route('course_lecturer.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year1">
                        <tr>
                            <th class="">STT</th>
                            <th class="th1">Tên giảng viên</th>
                            <th class="th2">Môn học</th>
                            <th class="th2">Học kỳ</th>
                            <th class="th2">Năm học</th>
                            <th class="th3">Số SV</th>
                            <th class="">Giờ lý thuyết</th>
                            <th class="">Giờ thực hành</th>
                            <th class="">Giờ tự học</th>
                            <th class="">Trong giờ</th>
                            <th class="">Ngoài giờ</th>
                            <th class="">Ngày nghỉ</th>
                            <th class="">Giờ quy đổi</th>
                            <th class="cus1">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course_lecturers as $course_lecturer)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$course_lecturer->teacherName}}</td>
                                <td>{{$course_lecturer->courseName}}</td>
                                <td>{{$course_lecturer->semesterName}}</td>
                                <td>{{$course_lecturer->yearName}}</td>
                                <td>{{$course_lecturer->number_of_students}}</td>
                                <td>{{$course_lecturer->hour_theory}}</td>
                                <td>{{$course_lecturer->practice_hours}}</td>
                                <td>{{$course_lecturer->learning_time}}</td>
                                <td>{{$course_lecturer->in_hours}}</td>
                                <td>{{$course_lecturer->overtime}}</td>
                                <td>{{$course_lecturer->day_off}}</td>
                                <td>{{$course_lecturer->converted_hours}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditCourseLecturer{{$course_lecturer->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$course_lecturer->id}}" value="{{$course_lecturer->id}}" class="checkbox-remove"></td>
                 </form>
                            </tr>
                            <div class="modal fade" id="modalEditCourseLecturer{{$course_lecturer->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('course_lecturer.save')}}" id="formCourseLecturerEdit">
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <input type="hidden" name="id" value="{{$course_lecturer->id}}">
                                                    <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="semester" >
                                                            <option>Chọn học kỳ</option>
                                                            @foreach($semesters as $semester)
                                                                @php
                                                                    $selectSemester = $semester->semesterID == $course_lecturer->semesterID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Năm học </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="school_year" >
                                                            <option>Chọn năm học</option>
                                                            @foreach($school_years as $school_year)
                                                                @php
                                                                    $selectSchoolYear = $school_year->yearID == $course_lecturer->yearID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$school_year->yearID}}" {{$selectSchoolYear}}>{{$school_year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Tên giảng viên </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="teacher" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->teacherName}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Môn học </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="course" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->courseName}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Số sinh viên</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="number_of_student" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->number_of_students}}">
                                                    </div>

                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Giờ lý thuyết</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="hour_theory" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->hour_theory}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Giờ thực hành</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="practice_hours" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->practice_hours}}">
                                                    </div>

                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Giờ tự học</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="learning_time" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->learning_time}}">
                                                    </div>
                                                </div>  
                                                 
                                                <div class="form-group row">
                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Trong giờ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="in_hours" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->in_hours}}">
                                                    </div>
                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Ngoài giờ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="overtime" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->overtime}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Ngày nghỉ</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="day_off" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->day_off}}">
                                                    </div>

                                                    <label for="courseLecturerCreate" class="col-sm-3 col-form-label">Giờ quy đổi</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="converted_hours" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$course_lecturer->converted_hours}}">
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
            $("#importExcel").validate({
                rules: {
                    imported-file: "required"
                    },
                messages: {
                    imported-file: "Vui lòng nhập file."
                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#formCourseLecturerCreate").validate({
                rules: {
                        teacher: "required", 
                        course: "required", 
                        semester: "required", 
                        school_year: "required", 
                        number_of_student: "required", 
                        hour_theory: "required", 
                        practice_hours: "required", 
                        learning_time: "required", 
                        in_hours: "required", 
                        overtime: "required", 
                        in_hours: "required", 
                        day_off: "required", 
                        converted_hours: "required", 
                        exchange: "required"
                    },
                messages: {
                        teacher: "Vui lòng điền tên giáo viên", 
                        course: "Vui lòng điền tên môn học", 
                        semester: "Vui lòng chọn học kỳ", 
                        school_year: "Vui lòng chọn năm học", 
                        number_of_student: "Vui lòng điền số sinh viên", 
                        hour_theory: "Vui lòng điền giờ lý thuyết", 
                        practice_hours: "Vui lòng điền giờ thực hành", 
                        learning_time: "Vui lòng điền giờ tự học", 
                        in_hours: "Vui lòng điền trong giờ", 
                        overtime: "Vui lòng điền ngoài giờ", 
                        day_off: "Vui lòng điền ngày nghỉ", 
                        converted_hours: "Vui lòng điền giờ qui đổi", 
                        exchange: "Vui lòng điền chênh lệch"
                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        semester: "required", 
                        school_year: "required", 
                        imported_file: "required"
                    },
                messages: {
                        semester: "Vui lòng chọn học kỳ", 
                        school_year: "Vui lòng chọn năm học", 
                        imported_file: "Vui lòng nhập file."
                }
            });
        });
    </script>  
@endsection
