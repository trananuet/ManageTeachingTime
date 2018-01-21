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
            <h3>Thống kê giờ dạy</h3>
            <hr>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <span>{{$errors->first('checkbox')}}</span>
                </div>
            @endif
            {{--  <div class="row"> 
                <form method="POST" action="{{route('courses.filter')}}" id="formFilterCourses">
                            {{ csrf_field() }}
                    <div class="filter-orther">
                        <label for="filterYear" class="col-sm-2 col-form-label label-filter ">Năm học</label>
                        <div class="col-sm-3 filter-year"> 
                            <select type="text" name="year_id" class="form-control input-filter" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn năm học</option>
                                @foreach($school_years as $school_year)
                                    @if(session('year_id'))
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
                                    @if(session('semester_id'))
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
            </div>  --}}
            <br>
            <div class="content-table relative">
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year1">
                        <tr>
                            <th class="" rowspan="2">STT</th>
                            <th class="" rowspan="2">Tên giảng viên</th>
                            <th class="" rowspan="2">Học phần</th>
                            <th class="" rowspan="2">TC</th> 
                            <th class="" rowspan="2">Mã LHP</th>
                            <th class="" rowspan="2">Sĩ số</th>
                            <th class="" rowspan="2">Nhóm</th>
                            <th class="" colspan="7">Lý thuyết</th>
                            <th class="" colspan="8">Thực hành</th>
                            <th class="" colspan="2">Tự học</th>
                            <th class="" rowspan="2">Tổng QC</th>
                            <th class="" rowspan="2">Thành tiền</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>SS/N</th>
                            <th>Sg/N</th>
                            <th>SgTr</th>
                            <th>SgNg</th>
                            <th>Sg7</th>
                            <th>QC</th>
                            <th>N</th>
                            <th>SS/N</th>
                            <th>CB</th>
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
                        @foreach($course_lecturers as $course_lecturer)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$course_lecturer->teacherName}}</td>
                                <td>{{$course_lecturer->courseName}}</td>
                                <td>{{$course_lecturer->credit}}</td>
                                <td>{{$course_lecturer->code_name}}</td>
                                <td>{{$course_lecturer->number_of_students}}</td>
                                <td>CL</td>
                                <td>{{$course_lecturer->theory_group}}</td>
                                <td></td>
                                <td>{{$course_lecturer->sum_theory_hour}}</td>
                                <td>{{$course_lecturer->theory_in_hour}}</td>
                                <td>{{$course_lecturer->theory_overtime}}</td>
                                <td>{{$course_lecturer->theory_day_off}}</td>
                                <td>{{$course_lecturer->theory_standard}}</td>

                                <td>{{$course_lecturer->practice_group }}</td>
                                <td></td>
                                <td></td>
                                <td>{{$course_lecturer->sum_practice_hour }}</td>
                                <td>{{$course_lecturer->practice_in_hour}}</td>
                                <td>{{$course_lecturer->practice_overtime}}</td>
                                <td>{{$course_lecturer->practice_day_off}}</td>
                                <td>{{$course_lecturer->practice_standard}}</td>

                                <td>{{$course_lecturer->self_learning_time}}</td>
                                <td>{{$course_lecturer->self_learning_standard}}</td>

                                <td>{!! number_format(($course_lecturer->theory_standard)+($course_lecturer->practice_standard)+($course_lecturer->self_learning_standard), 0, ',', '.') !!}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 add-btn1">
                <button data-toggle="modal" data-target="#modalCourseLecturer" class="btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Xuất file</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
     {{--  <script>
        $(document).ready(function() {
            $('#table_training').dataTable( {
                "autoWidth": false,
            });
        });
    </script>  --}}
@endsection
