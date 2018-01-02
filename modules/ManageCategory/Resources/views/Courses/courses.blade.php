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
            <h3>Môn học</h3>
            <hr>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <span>{{$errors->first('checkbox')}}</span>
                </div>
            @endif
            <div class="row"> 
                <form method="POST" action="{{route('courses.filter')}}" id="formFilterCourses">
                            {{ csrf_field() }}
                    <div class="filter-orther">
                        <label for="filterYear" class="col-sm-2 col-form-label label-filter ">Năm học</label>
                        <div class="col-sm-3 filter-year"> 
                            <select type="text" name="year_id" class="form-control input-filter" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn năm học</option>
                                @foreach($school_years as $school_year)
                                    @if(session('year_id') && session('courses'))
                                        @php
                                            $selectYear = $school_year->yearID == session('year_id') ? "selected" : null;
                                        @endphp
                                        <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                    @else
                                        <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="filterSemester" class="col-sm-2 col-form-label label-filter filter-semester">Học kỳ</label>
                        <div class="col-sm-3"> 
                            <select type="text" name="semester_id" class="form-control input-filter" id="filterSemester" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn học kỳ</option>
                                @foreach($semesters as $semester)
                                    @if(session('semester_id') && session('courses'))
                                        @php
                                            $selectSemester = $semester->semesterID == session('semester_id') ? "selected" : null;
                                        @endphp
                                        <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}}</option>
                                    @else 
                                        <option value="{{$semester->semesterID}}">{{$semester->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="sumbit" class="hidden"></button>
                    </div>
                </form>
            </div>
            <br>
            <div class="col-md-2 add-btn-orther">
                <button data-toggle="modal" data-target="#modalTeacher" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
            <!-- LINE MODAL -->
            <div class="modal fade" id="modalTeacher" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
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
                                <form method="POST" action="{{route('courses.save')}}" id="formCoursesCreate">
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                        <!-- content goes here -->
                                        <div class="form-group row">
                                            <label for="courseCreate" class="col-sm-3 col-form-label">Tên học phần</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="courseCreate" placeholder="Tên học phần">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code_name_create" class="col-sm-3 col-form-label">Mã học phần</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="code_name" class="form-control" id="code_name_create" placeholder="Mã học phần">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="creditCreate" class="col-sm-3 col-form-label">Tín chỉ</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="credit" class="form-control" id="creditCreate" placeholder="Tín chỉ">
                                            </div>
                                        </div>
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
                                                <select class="form-control" name="schoolYear" style="color: #000;">
                                                    <option value="">Chọn năm học</option>
                                                    @foreach($school_years as $school_year)
                                                        <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Lý thuyết</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="theory" class="form-control" id="" placeholder="Lý thuyết">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Thực hành</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="practice" class="form-control" id="" placeholder="Thực hành">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Tự học</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="self_study" class="form-control" id="" placeholder="Tự học">
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
                                <form action="{{route('courses.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <!-- content goes here -->
                                         <div class="form-group row">
                                            <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="semesterID" style="color: #000;">
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
                                                <select class="form-control" name="yearID" style="color: #000;">
                                                    <option value="">Chọn năm học</option>
                                                    @foreach($school_years as $school_year)
                                                        <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group row">
                                            <label for="trainingCreate" class="col-sm-3 col-form-label">Import File</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="imported_file"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for=" " class="col-sm-3 col-form-label"> </label>
                                            <div class="col-sm-9">
                                                <b>Trường dữ liệu {name,theory,practice,selfStudy}</b>
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
        @if(session('courses'))
            <div class="content-table relative">
                <form method="POST" action="{{route('courses.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="th-1">Tên học phần</th>
                            <th class="th-1">Mã LHP</th>
                            <th class="">Tín chỉ</th>
                            <th class="">Lý thuyết</th>
                            <th class="">Thực hành</th>
                            <th class="">Tự học</th>
                            <th class="cus">Tùy chọn</th>   
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('courses') as $course)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->code_name}}</td>
                                <td>{{$course->credit}}</td>
                                <td>{{$course->theory}}</td>
                                <td>{{$course->practice}}</td>
                                <td>{{$course->self_study}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditCourse{{$course->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$course->id}}" value="{{$course->id}}" class="checkbox-remove"></td>
                    </form>
                            </tr>
                            <div class="modal fade" id="modalEditCourse{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('courses.save')}}" id="formcourseEdit">
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <input type="hidden" name="id" value="{{$course->id}}">
                                                    <div class="form-group row">
                                                        <label for="courseCreate" class="col-sm-3 col-form-label">Tên học phần</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="name" class="form-control" id="courseCreate" placeholder="Tên môn học" value="{{$course->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="code_name_create" class="col-sm-3 col-form-label">Mã học phần</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="code_name" class="form-control" id="code_name_create" placeholder="Mã học phần" value="{{$course->code_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="creditCreate" class="col-sm-3 col-form-label">Tín chỉ</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="credit" class="form-control" id="creditCreate" placeholder="Tín chỉ" value="{{$course->credit}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="semester" >
                                                                <option>Chọn học kỳ</option>
                                                                @foreach($semesters as $semester)
                                                                    @php
                                                                        $selectSemester = $semester->semesterID == $course->semesterID ? "selected" : null;
                                                                    @endphp
                                                                    <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for=" " class="col-sm-3 col-form-label">Năm học </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="schoolYear" >
                                                                <option>Chọn năm học</option>
                                                                @foreach($school_years as $school_year)
                                                                    @php
                                                                        $selectYear = $school_year->yearID == $course->yearID ? "selected" : null;
                                                                    @endphp
                                                                    <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="courseCreate" class="col-sm-3 col-form-label">Lý thuyết</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="theory" class="form-control" id="courseCreate" placeholder="Lý thuyết" value="{{$course->theory}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="courseCreate" class="col-sm-3 col-form-label">Thực hành</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="practice" class="form-control" id="courseCreate" placeholder="Thực hành" value="{{$course->practice}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="courseCreate" class="col-sm-3 col-form-label">Tự học</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="self_study" class="form-control" id="courseCreate" placeholder="Tự học" value="{{$course->self_study}}">
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

        @else
        <div class="content-table relative">
            <form method="POST" action="{{route('courses.remove')}}">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                </div>
            <table class="table table-hover table-condensed table-bordered" id="table_training">
                <thead class ="table-school-year">
                    <tr>
                        <th class="stt active-display">STT</th>
                        <th class="th-1">Tên học phần</th>
                        <th class="th-1">Mã LHP</th>
                        <th class="">Tín chỉ</th>
                        <th class="">Lý thuyết</th>
                        <th class="">Thực hành</th>
                        <th class="">Tự học</th>
                        <th class="cus">Tùy chọn</th>   
                        <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td class="active-display">{{++$loop->index}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->code_name}}</td>
                            <td>{{$course->credit}}</td>
                            <td>{{$course->theory}}</td>
                            <td>{{$course->practice}}</td>
                            <td>{{$course->self_study}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditCourse{{$course->id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class=""><input type="checkbox" name="checkbox[]" id="{{$course->id}}" value="{{$course->id}}" class="checkbox-remove"></td>
                </form>
                        </tr>
                        <div class="modal fade" id="modalEditCourse{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('courses.save')}}" id="formcourseEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="id" value="{{$course->id}}">
                                                <div class="form-group row">
                                                    <label for="courseCreate" class="col-sm-3 col-form-label">Tên học phần</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" id="courseCreate" placeholder="Tên môn học" value="{{$course->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="code_name_create" class="col-sm-3 col-form-label">Mã học phần</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="code_name" class="form-control" id="code_name_create" placeholder="Mã học phần" value="{{$course->code_name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="creditCreate" class="col-sm-3 col-form-label">Tín chỉ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="credit" class="form-control" id="creditCreate" placeholder="Tín chỉ" value="{{$course->credit}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Học kỳ </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="semester" >
                                                            <option>Chọn học kỳ</option>
                                                            @foreach($semesters as $semester)
                                                                @php
                                                                    $selectSemester = $semester->semesterID == $course->semesterID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Năm học </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="schoolYear" >
                                                            <option>Chọn năm học</option>
                                                            @foreach($school_years as $school_year)
                                                                @php
                                                                    $selectYear = $school_year->yearID == $course->yearID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="courseCreate" class="col-sm-3 col-form-label">Lý thuyết</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="theory" class="form-control" id="courseCreate" placeholder="Lý thuyết" value="{{$course->theory}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="courseCreate" class="col-sm-3 col-form-label">Thực hành</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="practice" class="form-control" id="courseCreate" placeholder="Thực hành" value="{{$course->practice}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="courseCreate" class="col-sm-3 col-form-label">Tự học</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="self_study" class="form-control" id="courseCreate" placeholder="Tự học" value="{{$course->self_study}}">
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
        @endif
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
            $("#formCoursesCreate").validate({
                rules: {
                        name: "required", 
                        semester: "required", 
                        schoolYear: "required", 
                        theory: "required",
                        practice: "required",
                        self_study: "required"

                    },
                messages: {
                        name: "Vui lòng điền tên môn học.",
                        semester: "Vui lòng chọn học kỳ.",
                        schoolYear: "Vui lòng chọn năm học.",
                        theory: "Vui lòng điền số giờ lý thuyết.",
                        practice: "Vui lòng điền số giờ thực hành.",
                        self_study: "Vui lòng điền số giờ tự học."
                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        semesterID: "required", 
                        yearID: "required",
                        imported_file: "required"

                    },
                messages: {
                        semesterID: "Vui lòng chọn học kỳ.",
                        yearID: "Vui lòng chọn năm học.",
                        imported_file: "Vui lòng nhập file."
                }
            });
        });
    </script>  
@endsection
