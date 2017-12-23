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
            <div class="filter row">
                <form method="POST" action="" id="">
                            {{ csrf_field() }}
                        <div class="col-sm-3">
                            <label for="filterYear" class="col-form-label label-filter">Năm học</label>
                            <select type="text" name="year" class="form-control input-filter" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn năm học</option>
                                @foreach($school_years as $school_year)
                                    {{--  @if(session('schoolYear') && session('semesterFilter'))
                                    @php
                                        $selectYear = $school_year->yearID == session('schoolYear')->yearID ? "selected" : null;
                                    @endphp
                                    <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                    @else  --}}
                                    <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                    {{--  @endif  --}}
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="hidden"></button>
                </form>
                {{--  <form method="POST" action="" id="">
                            {{ csrf_field() }}  --}}
                        <div class="col-sm-3">
                            <label for="filterYear" class="col-form-label label-filter">Học kỳ</label>
                            <select type="text" name="year" class="form-control input-filter" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn học kỳ</option>
                                @foreach($school_years as $school_year)
                                    {{--  @if(session('schoolYear') && session('semesterFilter'))
                                    @php
                                        $selectYear = $school_year->yearID == session('schoolYear')->yearID ? "selected" : null;
                                    @endphp
                                    <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                    @else  --}}
                                    <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                    {{--  @endif  --}}
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="hidden"></button>
                </form>
            </div>
        <div class="school-content-table1 relative">
            {{--  <form method="POST" action="">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                </div> 
            </form>   --}}
            <table class="table table-hover table-condensed table-bordered" id="table_training">
                <thead class ="table-school-year1">
                    <tr>
                        <th class="" rowspan="2">STT</th>
                        <th class="th1" rowspan="2">Tên giảng viên</th>
                        <th class="th2" rowspan="2">Học phần</th>
                        <th class="th3" rowspan="2">TC</th> 
                        <th class="th2" rowspan="2">Mã LHP</th>
                        <th class="th3" rowspan="2">Sĩ số</th>
                        <th class="th3" rowspan="2">Nhóm</th>
                        <th class="" colspan="7">Lý thuyết</th>
                        <th class="" colspan="8">Thực hành</th>
                        <th class="" colspan="2">Tự học</th>
                        <th class="th3" rowspan="2">Tổng QC</th>
                        <th class="th3" rowspan="2">Thành tiền</th>
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
                            <td></td>
                            <td></td>
                            <td>{{$course_lecturer->number_of_students}}</td>
                            <td></td>
                            <td>{{$course_lecturer->hour_theory}}</td>
                            <td>{{$course_lecturer->practice_hours}}</td>
                            <td>{{$course_lecturer->learning_time}}</td>
                            <td>{{$course_lecturer->in_hours}}</td>
                            <td>{{$course_lecturer->overtime}}</td>
                            <td>{{$course_lecturer->day_off}}</td>
                            <td>{{$course_lecturer->converted_hours}}</td>

                            <td>{{$course_lecturer->hour_theory}}</td>
                            <td>{{$course_lecturer->practice_hours}}</td>
                            <td>{{$course_lecturer->learning_time}}</td>
                            <td>{{$course_lecturer->in_hours}}</td>
                            <td>{{$course_lecturer->overtime}}</td>
                            <td>{{$course_lecturer->day_off}}</td>
                            <td>{{$course_lecturer->converted_hours}}</td>

                            <td>{{$course_lecturer->in_hours}}</td>
                            <td>{{$course_lecturer->overtime}}</td>
                            <td>{{$course_lecturer->day_off}}</td>
                            <td>{{$course_lecturer->converted_hours}}</td>

                            <td>{{$course_lecturer->converted_hours}}</td>
                        </tr>
                        
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
@endsection
