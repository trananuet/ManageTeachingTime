<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống quản lý giờ giảng - Trường Đại học Công Nghệ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">	
	
</head>
<body>
<div class="container-fluid">
    <div class="box-top row">
        <br>
        <h3>Thống kê giờ dạy</h3>
        <hr>
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

</body>
</html>