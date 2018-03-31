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
        table.dataTable tbody td {
            padding: 5px 10px;
        }
    </style>
@endsection
@section('content')
@include('base::layouts.manager-left')
    <h3>Giảng Viên Môn Học</h3>
    <hr>
    @if($errors->has('checkbox'))
        <div class="alert alert-danger">
            <span>{{$errors->first('checkbox')}}</span>
        </div>
    @endif
    <div class="row"> 
        <form method="POST" action="" id="formFilterTraining">
            {{ csrf_field() }}
            <div class="filter col-md-8 row">
                <label for="filterSemester" class="col-sm-3 col-form-label label-filter">Học Kỳ - Năm Học</label>
                <div class="col-sm-6"> 
                    <select type="text" name="semester" class="form-control input-filter" id="filterTraining" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option value="">Chọn học kỳ - năm học</option>
                        @foreach($semesters as $semester)
                            @if(session('semester') && session('semesterFilter'))
                            @php
                                $selectSemester = $semester->semesterID == session('semester')->semesterID ? "selected" : null;
                            @endphp
                            <option value="{{$semester->semesterID}}" {{$selectSemester}}>{{$semester->name}} {{$semester->schoolYear}}</option>
                            @else
                            <option value="{{$semester->semesterID}}">{{$semester->name}} {{$semester->schoolYear}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="hidden"></button>
            </div>
        </form>
    </div>

    <div class="school-content-table1 relative">
            <table class="table table-hover table-condensed table-bordered table-data-teach" id="table-statistic-course">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-statistic-course').dataTable( {
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