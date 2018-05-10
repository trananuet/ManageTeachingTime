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
    <div class="row">
        @if($errors->has('checkbox'))
            <div class="alert alert-danger">
                <span>{{$errors->first('checkbox')}}</span>
            </div>
        @endif
    </div>
    <div class="col-md-2 remove-btn-session">
        <a href="{{route('remove_filter.remove_session')}}">
            <button class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Xóa bộ lọc</button>
        </a>
    </div>
    <div class="row row-filter"> 
        <form method="POST" action="{{route('statistic_teach.filter')}}" id="form-filter-statistic-course">
            {{ csrf_field() }}
            <div class="filter col-md-8 row">
                <label for="filterSemester" class="col-sm-3 col-form-label label-filter">Học Kỳ - Năm Học</label>
                <div class="col-sm-6"> 
                    <select type="text" name="semester" class="form-control input-filter" id="" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option value="">Chọn học kỳ - năm học</option>
                        @foreach($semesters as $semester)
                            @if(session('semester_id') && session('data_teaches'))
                                @php
                                    $selectSemester = $semester->semesterID == session('semester_id')? "selected" : null;
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
    @if(session('data_teaches'))
        <div class="school-content-table1 relative">
                <table class="table table-hover table-condensed table-bordered table-data-teach" id="table-statistic-course">
                    <thead class ="table-school-year1">
                        <tr>
                            <th class="" rowspan="2">STT</th>
                            <th class="th1" rowspan="2">Tên giảng viên</th>
                            <th class="th2" rowspan="2">Môn học</th>
                            <th class="th3" rowspan="2">SS</th>
                            <th class="th3" rowspan="2">Nhóm</th>
                            <th colspan="7" >Lý thuyết</th>
                            <th colspan="7" >Thực hành</th>
                            <th colspan="2" >Tự học</th>
                            <th class="th3" rowspan="2">Tổng QC</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>Ss/N</th>
                            <th>Sg/N</th>
                            <th>SgTr</th>
                            <th>SgNg</th>
                            <th>Sg7</th>
                            <th>QC</th>
                            <th>N</th>
                            <th>Ss/N</th>
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
                        @foreach(session('data_teaches') as $data_teach)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$data_teach->teacherName}}</td>
                                <td>{{$data_teach->courseName}}</td>
                                <td>{{$data_teach->number_of_students}}</td>
                                <td>{{$data_teach->course_group}}</td>
                                <td>{{$data_teach->theory_group}}</td>
                                <td>{{$data_teach->number_student_theory}}</td>
                                <td>{{$data_teach->sum_theory_hour}}</td>
                                @if( $data_teach->theory_in_hour == 0)
                                    <td>    </td>
                                @else
                                    <td>{{$data_teach->theory_in_hour}}</td>
                                @endif

                                @if( $data_teach->theory_overtime == 0)
                                    <td>    </td>                            
                                @else
                                    <td>{{$data_teach->theory_overtime}}</td>
                                @endif

                                @if( $data_teach->theory_day_off == 0)
                                    <td>    </td>                            
                                @else
                                    <td>{{$data_teach->theory_day_off}}</td>
                                @endif

                                {{--  sĩ số trên nhóm <= 30 thì quy chuẩn x1
                                sĩ số trên nhóm <= 60 thì quy chuẩn x1,2
                                sĩ số trên nhóm <= 90 thì quy chuẩn x1,4
                                sĩ số trên nhóm > 90 thì quy chuẩn x1,5  --}}
                                @if( $data_teach->number_student_theory <= 30 && $data_teach->number_student_theory > 0)
                                    <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour}}">
                                    <td>{{$data_teach->sum_theory_hour}}</td>
                                @elseif ($data_teach->number_student_theory > 30 && $data_teach->number_student_theory <= 60)
                                    <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.2}}">
                                    <td>{{$data_teach->sum_theory_hour * 1.2}}</td>
                                @elseif ($data_teach->number_student_theory > 60 && $data_teach->number_student_theory <= 90)
                                    <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.4}}">
                                    <td>{{$data_teach->sum_theory_hour * 1.4}}</td>
                                @elseif ($data_teach->number_student_theory > 90)
                                    <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.5}}">
                                    <td>{{$data_teach->sum_theory_hour * 1.5}}</td>
                                @elseif ($data_teach->number_student_theory == 0)
                                    <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "0">
                                    <td></td>
                                @endif

                                @if( $data_teach->practice_group == 0)
                                    <td></td>
                                @else 
                                    <td>{{$data_teach->practice_group }}</td>
                                @endif

                                @if( $data_teach->number_student_practice == 0)
                                    <td></td>
                                @else 
                                    <td>{{$data_teach->number_student_practice }}</td>
                                @endif

                                @if( $data_teach->sum_practice_hour == 0)
                                    <td></td>
                                @else 
                                    <td>{{$data_teach->sum_practice_hour }}</td>
                                @endif

                                @if( $data_teach->practice_in_hour == 0)
                                    <td></td>
                                @else    
                                    <td>{{$data_teach->practice_in_hour}}</td>
                                @endif

                                @if( $data_teach->practice_overtime == 0)
                                    <td></td>
                                @else
                                    <td>{{$data_teach->practice_overtime}}</td>
                                @endif
                                
                                @if( $data_teach->practice_day_off == 0)
                                    <td></td>
                                @else
                                    <td>{{$data_teach->practice_day_off}}</td>
                                @endif

                                {{--  sĩ số trên nhóm <= 10 thì quy chuẩn x 0.6
                                sĩ số trên nhóm <= 20 thì quy chuẩn x 0.7
                                sĩ số trên nhóm > 20 thì quy chuẩn x 0.8  --}}
                                @if( $data_teach->number_student_practice <= 10 && $data_teach->number_student_practice > 0)
                                    <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.6}}">
                                    <td>{{$data_teach->sum_practice_hour * 0.6}}</td>
                                @elseif ($data_teach->number_student_practice > 10 && $data_teach->number_student_practice <= 20)
                                    <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.7}}">
                                    <td id="value-stand-pra" data-standard = "{{$data_teach->sum_practice_hour * 0.7}}">{{$data_teach->sum_practice_hour * 0.7}}</td>
                                @elseif ($data_teach->number_student_practice > 20 )
                                    <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.8}}">
                                    <td id="value-stand-pra" data-standard = "{{$data_teach->sum_practice_hour * 0.8}}">{{$data_teach->sum_practice_hour * 0.8}}</td>
                                @elseif ($data_teach->number_student_practice == 0)
                                    <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "0">
                                    <td id="value-stand-pra" data-standard = "0"></td>
                                @endif

                                @if( $data_teach->self_learning_time == 0)
                                    <td></td>
                                @else
                                    <td>{{$data_teach->self_learning_time}}</td>
                                @endif

                                {{--  quy chuẩn x3  --}}
                                @if ($data_teach->self_learning_time == 0)
                                    <input type="text" class="hidden" id="value-stand-self{{$data_teach->id}}" value = "0">
                                    <td></td>
                                @else
                                    <input type="text" class="hidden" id="value-stand-self{{$data_teach->id}}" value = "{{$data_teach->self_learning_time * 3}}"> 
                                    <td>{{$data_teach->self_learning_time * 3}}</td>
                                @endif
                                <td id="sum-standard{{$data_teach->id}}"></td>
                        @endforeach
                    </tbody>
                </table>
        </div>
            
     @else  
        <div class="school-content-table1 relative">
            <table class="table table-hover table-condensed table-bordered table-data-teach" id="table-statistic-course">
                <thead class ="table-school-year1">
                    <tr>
                        <th class="" rowspan="2">STT</th>
                        <th class="th1" rowspan="2">Tên giảng viên</th>
                        <th class="th2" rowspan="2">Môn học</th>
                        <th class="th3" rowspan="2">SS</th>
                        <th class="th3" rowspan="2">Nhóm</th>
                        <th colspan="7" >Lý thuyết</th>
                        <th colspan="7" >Thực hành</th>
                        <th colspan="2" >Tự học</th>
                        <th class="th3" rowspan="2">Tổng QC</th>
                    </tr>
                    <tr>
                        <th>N</th>
                        <th>Ss/N</th>
                        <th>Sg/N</th>
                        <th>SgTr</th>
                        <th>SgNg</th>
                        <th>Sg7</th>
                        <th>QC</th>
                        <th>N</th>
                        <th>Ss/N</th>
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
                            <td>{{$data_teach->number_student_theory}}</td>
                            <td>{{$data_teach->sum_theory_hour}}</td>
                            @if( $data_teach->theory_in_hour == 0)
                                <td>    </td>
                            @else
                                <td>{{$data_teach->theory_in_hour}}</td>
                            @endif

                            @if( $data_teach->theory_overtime == 0)
                                <td>    </td>                            
                            @else
                                <td>{{$data_teach->theory_overtime}}</td>
                            @endif

                            @if( $data_teach->theory_day_off == 0)
                                <td>    </td>                            
                            @else
                                <td>{{$data_teach->theory_day_off}}</td>
                            @endif

                            {{--  sĩ số trên nhóm <= 30 thì quy chuẩn x1
                            sĩ số trên nhóm <= 60 thì quy chuẩn x1,2
                            sĩ số trên nhóm <= 90 thì quy chuẩn x1,4
                            sĩ số trên nhóm > 90 thì quy chuẩn x1,5  --}}
                            @if( $data_teach->number_student_theory <= 30 && $data_teach->number_student_theory > 0)
                                <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour}}">
                                <td>{{$data_teach->sum_theory_hour}}</td>
                            @elseif ($data_teach->number_student_theory > 30 && $data_teach->number_student_theory <= 60)
                                <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.2}}">
                                <td>{{$data_teach->sum_theory_hour * 1.2}}</td>
                            @elseif ($data_teach->number_student_theory > 60 && $data_teach->number_student_theory <= 90)
                                <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.4}}">
                                <td>{{$data_teach->sum_theory_hour * 1.4}}</td>
                            @elseif ($data_teach->number_student_theory > 90)
                                <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "{{$data_teach->sum_theory_hour * 1.5}}">
                                <td>{{$data_teach->sum_theory_hour * 1.5}}</td>
                            @elseif ($data_teach->number_student_theory == 0)
                                <input type="text" class="hidden" id="value-stand-theo{{$data_teach->id}}" value = "0">
                                <td></td>
                            @endif

                            @if( $data_teach->practice_group == 0)
                                <td></td>
                            @else 
                                <td>{{$data_teach->practice_group }}</td>
                            @endif

                            @if( $data_teach->number_student_practice == 0)
                                <td></td>
                            @else 
                                <td>{{$data_teach->number_student_practice }}</td>
                            @endif

                            @if( $data_teach->sum_practice_hour == 0)
                                <td></td>
                            @else 
                                <td>{{$data_teach->sum_practice_hour }}</td>
                            @endif

                            @if( $data_teach->practice_in_hour == 0)
                                <td></td>
                            @else    
                                <td>{{$data_teach->practice_in_hour}}</td>
                            @endif

                            @if( $data_teach->practice_overtime == 0)
                                <td></td>
                            @else
                                <td>{{$data_teach->practice_overtime}}</td>
                            @endif
                            
                            @if( $data_teach->practice_day_off == 0)
                                <td></td>
                            @else
                                <td>{{$data_teach->practice_day_off}}</td>
                            @endif

                            {{--  sĩ số trên nhóm <= 10 thì quy chuẩn x 0.6
                            sĩ số trên nhóm <= 20 thì quy chuẩn x 0.7
                            sĩ số trên nhóm > 20 thì quy chuẩn x 0.8  --}}
                            @if( $data_teach->number_student_practice <= 10 && $data_teach->number_student_practice > 0)
                                <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.6}}">
                                <td>{{$data_teach->sum_practice_hour * 0.6}}</td>
                            @elseif ($data_teach->number_student_practice > 10 && $data_teach->number_student_practice <= 20)
                                <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.7}}">
                                <td id="value-stand-pra" data-standard = "{{$data_teach->sum_practice_hour * 0.7}}">{{$data_teach->sum_practice_hour * 0.7}}</td>
                            @elseif ($data_teach->number_student_practice > 20 )
                                <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "{{$data_teach->sum_practice_hour * 0.8}}">
                                <td id="value-stand-pra" data-standard = "{{$data_teach->sum_practice_hour * 0.8}}">{{$data_teach->sum_practice_hour * 0.8}}</td>
                            @elseif ($data_teach->number_student_practice == 0)
                                <input type="text" class="hidden" id="value-stand-pra{{$data_teach->id}}" value = "0">
                                <td id="value-stand-pra" data-standard = "0"></td>
                            @endif

                            @if( $data_teach->self_learning_time == 0)
                                <td></td>
                            @else
                                <td>{{$data_teach->self_learning_time}}</td>
                            @endif

                            {{--  quy chuẩn x3  --}}
                            @if ($data_teach->self_learning_time == 0)
                                <input type="text" class="hidden" id="value-stand-self{{$data_teach->id}}" value = "0">
                                <td></td>
                            @else
                                <input type="text" class="hidden" id="value-stand-self{{$data_teach->id}}" value = "{{$data_teach->self_learning_time * 3}}"> 
                                <td>{{$data_teach->self_learning_time * 3}}</td>
                            @endif
                            <td id="sum-standard{{$data_teach->id}}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    {{--  <div class="col-md-4 add-btn-2">
        <button data-toggle="modal" data-target="#modalCourseLecturer" class="btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Xuất file</button>
    </div>  --}}
    <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table-statistic-course').dataTable( {
                "autoWidth": false,
                "ordering" : false,
                dom: 'Bfrtip',
                //buttons: [
                    //'copy', 'csv', 'excel', 'pdf', 'print'
                //]
                buttons: [
                    'excel' , 'print'
                ]
            });
        });
    </script>
    
   {{--  <script>   
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
    </script>  --}}
    <script>   
        for(var i = 0; i < 1000; i++){
        var data_theory = $("input[id=value-stand-theo" + i +"]").attr('value');
        var data_pra = $("input[id=value-stand-pra" + i +"]").attr('value');
        var data_self = $("input[id=value-stand-self" + i +"]").attr('value');
        var sum_standard = parseFloat(data_theory) + parseFloat(data_pra) + parseFloat(data_self);
            $("#sum-standard" + i).append("<span>" + sum_standard + "</span>");
        }
        //var data_pra = $("input[id=value-stand-pra2]").attr('value');
        //console.log(data_pra);
    </script>  
@endsection