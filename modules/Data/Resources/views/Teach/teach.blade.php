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
    <h3>Số liệu giờ giảng dạy</h3>
    <hr>
    @if($errors->has('checkbox'))
        <div class="alert alert-danger">
            <span>{{$errors->first('checkbox')}}</span>
        </div>
    @endif

    <div class="col-md-4 add-btn1">
        <button data-toggle="modal" data-target="#modalTeaching" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
    </div>
    <!-- LINE MODAL -->

    <div class="modal fade" id="modalTeaching" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <ul class="nav nav-tabs nav-default" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="modal-content" style="width: 100%;">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="lineModalLabel">Nhập dữ liệu giảng dạy</h4>
                        </div>
                        <form method="POST" action="{{route('teach.save')}}" id="formDataTeachCreate">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <!-- content goes here -->
                                <div class="form-group row">
                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ - Năm học</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="semester" style="color: #000;">
                                            <option value="">Chọn học kỳ - năm học</option>
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->semesterID}}">{{$semester->name}} {{$semester->schoolYear}}</option>
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
                                    <label for="" class="col-sm-3 col-form-label">Sĩ số sinh viên</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="number_of_student" class="form-control" id="" placeholder="">
                                    </div>

                                    <label for="" class="col-sm-3 col-form-label">Nhóm</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="course_group" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row data_row_teach">
                                    <label for="" class="data_value_teach col-form-label">Lý Thuyết</label>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">N</i>
                                        <input type="text" name="theory_group" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">Sg/N</i>
                                        <input type="text" name="sum_theory_hour" class="form-control" id="" placeholder="" >
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">SgTr</i>
                                        <input type="text" name="theory_in_hour" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">SgNg</i>
                                        <input type="text" name="theory_overtime" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">Sg7</i>
                                        <input type="text" name="theory_day_off" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">QC</i>
                                        <input type="text" name="theory_standard" class="form-control" id="" placeholder="">
                                    </div>
                                </div>  
                                <div class="form-group row data_row_teach">
                                    <label for="" class="data_value_teach col-form-label">Thực Hành</label>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">N</i>
                                        <input type="text" name="practice_group" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">Sg/N</i>
                                        <input type="text" name="sum_practice_hour" class="form-control" id="" placeholder="" >
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">SgTr</i>
                                        <input type="text" name="practice_in_hour" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">SgNg</i>
                                        <input type="text" name="practice_overtime" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">Sg7</i>
                                        <input type="text" name="practice_day_off" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach">
                                        <i for="" class="data_value_teach col-form-label">QC</i>
                                        <input type="text" name="practice_standard" class="form-control" id="" placeholder="">
                                    </div>
                                </div> 
                                <div class="form-group row data_row_teach">
                                    <label for="" class="data_value_teach_other col-form-label">Tự Học</label>
                                    <div class="data_value_teach_other">
                                        <i for="" class="data_value_teach_other col-form-label">Sg</i>
                                        <input type="text" name="self_learning_time" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="data_value_teach_other">
                                        <i for="" class="data_value_teach_other col-form-label">QC</i>
                                        <input type="text" name="self_learning_standard" class="form-control" id="" placeholder="">
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
                        <form action="" method="post" enctype="multipart/form-data" id="importExcel">
                        {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ - Năm học</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="semester" style="color: #000;">
                                            <option value="">Chọn học kỳ - năm học</option>
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->semesterID}}">{{$semester->name}} {{$semester->schoolYear}}</option>
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
                                        <b style="font-size: 12px;"> {tengv,monhoc,so_sv,nhom,nhom_lt<br/>tronggio_lt,ngoaigio_lt,ngaynghi_lt,quychuan_lt,nhom_th,tronggio_th<br/>
                                            ngoaigio_th,ngaynghi_th,quychuan_th,gio_tuhoc,quychuan_tuhoc}
                                        </b>
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
    <div class="school-content-table1 relative">
        <form method="POST" action="{{route('teach.remove')}}">
            {{ csrf_field() }}
            <div class="box-remove-all">
                <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa danh sách giảng viên đã chọn?');">Xóa</button>
            </div>
            <table class="table table-hover table-condensed table-bordered" id="table-data-teach">
                <thead class ="table-school-year1">
                    <tr>
                        <th class="" rowspan="2">STT</th>
                        <th class="th1" rowspan="2">Tên giảng viên</th>
                        <th class="th2" rowspan="2">Môn học</th>
                        <th class="th3" rowspan="2">SS</th>
                        <th class="th3" rowspan="2">Nhóm</th>
                        <th colspan="6" >Lý thuyết</th>
                        <th colspan="6" >Thực hành</th>
                        <th colspan="2" >Tự học</th>
                        <th class="th3" rowspan="2">Tổng QC</th>
                        <th class="th3" rowspan="2">Tùy chọn</th>
                        <th class="stt" rowspan="2"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                    <tr>
                        <th>N</th>
                        <th>Sg/N</th>
                        <th>SgTr</th>
                        <th>SgNg</th>
                        <th>Sg7</th>
                        <th>QC</th>
                        <th>N</th>
                        <th>Sg/N</th>
                        <th>SgTr</th>
                        <th>SgNg</th>
                        <th>Sg7</th>
                        <th>QC</th>
                        <th>Sg</th>
                        <th>QC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_teaches as $data_teach)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td>{{$data_teach->teacherName}}</td>
                            <td>{{$data_teach->courseName}}</td>
                            <td>{{$data_teach->number_of_students}}</td>
                            <td>{{$data_teach->course_group}}</td>
                            <td>{{$data_teach->theory_group}}</td>
                            <td>{{$data_teach->sum_theory_hour}}</td>
                            <td>{{$data_teach->theory_in_hour}}</td>
                            <td>{{$data_teach->theory_overtime}}</td>
                            <td>{{$data_teach->theory_day_off}}</td>
                            <td>{{$data_teach->theory_standard}}</td>
                            <td>{{$data_teach->practice_group }}</td>
                            <td>{{$data_teach->sum_practice_hour }}</td>
                            <td>{{$data_teach->practice_in_hour}}</td>
                            <td>{{$data_teach->practice_overtime}}</td>
                            <td>{{$data_teach->practice_day_off}}</td>
                            <td>{{$data_teach->practice_standard}}</td>
                            <td>{{$data_teach->self_learning_time}}</td>
                            <td>{{$data_teach->self_learning_standard}}</td>
                            <td>{!! number_format(($data_teach->theory_standard)+($data_teach->practice_standard)+($data_teach->self_learning_standard), 0, ',', '.') !!}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditDataTeach{{$data_teach->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$data_teach->id}}" value="{{$data_teach->id}}" class="checkbox-remove"></td>
        </form>
                        </tr>
                        <div class="modal fade" id="modalEditDataTeach{{$data_teach->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 100%; margin-left: 10%;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                    </div>
                                    <<form method="POST" action="{{route('teach.save')}}" id="formDataTeachEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$data_teach->id}}">
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ - Năm học</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="semester" >
                                                            <option>Chọn học kỳ</option>
                                                            @foreach($semesters as $semester)
                                                                @php
                                                                    $selectSemester = $semester->semesterID == $data_teach->semesterID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}} {{$semester->schoolYear}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Tên giảng viên </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="teacher" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$data_teach->teacherName}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Môn học </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="course" class="form-control" id="courseLecturerCreate" placeholder="" value="{{$data_teach->courseName}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Sĩ số sinh viên</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="number_of_student" class="form-control" id="" placeholder="" value="{{$data_teach->number_of_students}}" >
                                                    </div>

                                                    <label for="" class="col-sm-3 col-form-label">Nhóm</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="course_group" class="form-control" id="" placeholder="" value="{{$data_teach->course_group}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row data_row_teach">
                                                    <label for="" class="data_value_teach col-form-label">Lý Thuyết</label>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">N</i>
                                                        <input type="text" name="theory_group" class="form-control" id="" placeholder="" value="{{$data_teach->theory_group}}" >
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">Sg/N</i>
                                                        <input type="text" name="sum_theory_hour" class="form-control" id="" placeholder="" value="{{$data_teach->sum_theory_hour}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">SgTr</i>
                                                        <input type="text" name="theory_in_hour" class="form-control" id="" placeholder="" value="{{$data_teach->theory_in_hour}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">SgNg</i>
                                                        <input type="text" name="theory_overtime" class="form-control" id="" placeholder="" value="{{$data_teach->theory_overtime}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">Sg7</i>
                                                        <input type="text" name="theory_day_off" class="form-control" id="" placeholder="" value="{{$data_teach->theory_day_off}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">QC</i>
                                                        <input type="text" name="theory_standard" class="form-control" id="" placeholder="" value="{{$data_teach->theory_standard}}">
                                                    </div>
                                                </div>  
                                                <div class="form-group row data_row_teach">
                                                    <label for="" class="data_value_teach col-form-label">Thực Hành</label>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">N</i>
                                                        <input type="text" name="practice_group" class="form-control" id="" placeholder="" value="{{$data_teach->practice_group}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">Sg/N</i>
                                                        <input type="text" name="sum_practice_hour" class="form-control" id="" placeholder="" value="{{$data_teach->sum_practice_hour}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">SgTr</i>
                                                        <input type="text" name="practice_in_hour" class="form-control" id="" placeholder="" value="{{$data_teach->practice_in_hour}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">SgNg</i>
                                                        <input type="text" name="practice_overtime" class="form-control" id="" placeholder="" value="{{$data_teach->practice_overtime}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">Sg7</i>
                                                        <input type="text" name="practice_day_off" class="form-control" id="" placeholder="" value="{{$data_teach->practice_day_off}}">
                                                    </div>
                                                    <div class="data_value_teach">
                                                        <i for="" class="data_value_teach col-form-label">QC</i>
                                                        <input type="text" name="practice_standard" class="form-control" id="" placeholder="" value="{{$data_teach->practice_standard}}">
                                                    </div>
                                                </div> 
                                                <div class="form-group row data_row_teach">
                                                    <label for="" class="data_value_teach_other col-form-label">Tự Học</label>
                                                    <div class="data_value_teach_other">
                                                        <i for="" class="data_value_teach_other col-form-label">Sg</i>
                                                        <input type="text" name="self_learning_time" class="form-control" id="" placeholder="" value="{{$data_teach->self_learning_time}}">
                                                    </div>
                                                    <div class="data_value_teach_other">
                                                        <i for="" class="data_value_teach_other col-form-label">QC</i>
                                                        <input type="text" name="self_learning_standard" class="form-control" id="" placeholder="" value="{{$data_teach->self_learning_standard}}">
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
    <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-data-teach').dataTable( {
                "autoWidth": false,
                "ordering" : false
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
