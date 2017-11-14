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
                <div class="col-md-12">
                    <div class="form-group">
                        <hr>
                        <h3>Học kỳ</h3>
                        <hr>
                        <button data-toggle="modal" data-target="#modalSemester" class="btn btn-primary col-md-1">Thêm học kỳ</button>
                        <!-- LINE MODAL -->
                        <div class="modal fade" id="modalSemester" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header" style="background: #cbffd1">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                    </div>
                                    <form method="POST" action="{{route('semester.save')}}" id="formSemesterCreate">
                                    {{ csrf_field() }}
                                        <div class="modal-body">
                                            <!-- content goes here -->
                                            <input type="hidden" name="semesterID" value="">
                                            <div class="form-group row">
                                                <label for="yearIDFormCreate" class="col-sm-3 col-form-label">Năm học</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="yearID" class="form-control" id="yearIDFormCreate" style="color: #000;">
                                                        <option value="">Chọn năm học</option>
                                                        @foreach($school_years as $school_year)
                                                            <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="semesterCreate" class="col-sm-3 col-form-label">Học kỳ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="semesters" class="form-control" id="semesterCreate" placeholder="Học kỳ">
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
                        <form method="POST" action="{{route('semester.filter')}}" id="formFilterYear">
                                    {{ csrf_field() }}
                        <div class="filter-year col-md-6 col-md-offset-1">
                            <label for="filterYear" class="col-sm-3 col-form-label label-filter-year">Lọc năm học</label>
                            <select type="text" name="year" class="form-control input-filter-year" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn năm học</option>
                                @foreach($school_years as $school_year)
                                    @if(session('schoolYear') && session('semesterFilter'))
                                    @php
                                        $selectYear = $school_year->yearID == session('schoolYear')->yearID ? "selected" : null;
                                    @endphp
                                    <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                    @else
                                    <option value="{{$school_year->yearID}}">{{$school_year->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit" class="hidden"></button>
                        </div>
                        </form>
                    </div>
                </div>
                <hr/>
            </div>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <strong>{{$errors->first('checkbox')}}</strong>
                </div>
            @endif 
            @if(session('schoolYear') && session('semesterFilter'))
                <div class="semester-content-table relative">
                    <form method="POST" action="{{route('semester.remove')}}" id="btnRemoveSemester">
                    {{ csrf_field() }}
                    <button id="button-remove-semester" type="submit" class="btn btn-danger removeSemester">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>  
                    <table class="table table-hover table-condensed table-bordered " id ="semester">
                        <thead class ="table-semester">
                            <tr>
                                <th class="">STT</th>
                                <th class="">Học kỳ</th>
                                <th class="">Năm học</th>
                                <th class="">Tùy chọn</th>
                                <th class=""><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove" style="margin-left: 8px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('semesterFilter') as $semester)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$semester->name}}</td>
                                    <td>{{session('schoolYear')->name}}</td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSemester{{$semester->semesterID}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td> 
                                    <td><input type="checkbox" name="checkbox[]" id="{{$semester->semesterID}}" value="{{$semester->semesterID}}" class="checkbox-remove"></td>
                                </tr>
                    </form>
                                <div class="modal fade" id="modalEditSemester{{$semester->semesterID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header" style="background: #cbffd1">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('semester.save')}}" id="formSemesterEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="semesterID" value="{{$semester->semesterID}}">
                                                <div class="form-group row">
                                                    <label for="yearIDFormEdit" class="col-sm-3 col-form-label">Năm học</label>
                                                    <div class="col-sm-9">
                                                        <select type="text" name="yearID" class="form-control" id="yearIDFormEdit" required>
                                                            <option value="">Chọn năm học</option>
                                                            @foreach($school_years as $school_year)
                                                                @php
                                                                    $selectYear = $school_year->yearID == $semester->yearID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="semesterEdit" class="col-sm-3 col-form-label">Học kỳ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="semesters" class="form-control" id="semesterEdit" placeholder="Học kỳ" value="{{$semester->name}}" required>
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
                <div class="semester-content-table relative">
                    <form method="POST" action="{{route('semester.remove')}}" id="btnRemoveSemester">
                    {{ csrf_field() }}
                    <button id="button-remove-semester" type="submit" class="btn btn-danger removeSemester">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>  
                    <table class="table table-hover table-condensed table-bordered " id ="semester">
                        <thead class ="table-semester">
                            <tr>
                                <th class="">STT</th>
                                <th class="">Học kỳ</th>
                                <th class="">Năm học</th>
                                <th class="">Tùy chọn</th>
                                <th class=""><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove" style="margin-left: 8px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($semesters as $semester)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$semester->name}}</td>
                                    <td>{{$semester->schoolYear}}</td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSemester{{$semester->semesterID}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td> 
                                    <td><input type="checkbox" name="checkbox[]" id="{{$semester->semesterID}}" value="{{$semester->semesterID}}" class="checkbox-remove"></td>
                                </tr>
                    </form>
                                <div class="modal fade" id="modalEditSemester{{$semester->semesterID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header" style="background: #cbffd1">
                                            <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('semester.save')}}" id="formSemesterEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="semesterID" value="{{$semester->semesterID}}">
                                                <div class="form-group row">
                                                    <label for="yearIDFormEdit" class="col-sm-3 col-form-label">Năm học</label>
                                                    <div class="col-sm-9">
                                                        <select type="text" name="yearID" class="form-control" id="yearIDFormEdit" required>
                                                            <option value="">Chọn năm học</option>
                                                            @foreach($school_years as $school_year)
                                                            @php
                                                                    $selectYear = $school_year->yearID == $semester->yearID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$school_year->yearID}}" {{$selectYear}}>{{$school_year->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="semesterEdit" class="col-sm-3 col-form-label">Học kỳ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="semesters" class="form-control" id="semesterEdit" placeholder="Học kỳ" value="{{$semester->name}}" required>
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
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#semester').DataTable();
        } );
    </script>
    <script src="{{asset('/node_modules/validatejs/jquery.validate.min.js')}}"></script>
    <script>   
        $(function() {
            $("#formSemesterCreate").validate({
                rules: {
                    yearID: "required",
                    semesters: "required"
                    },
                messages: {
                    yearID: "Vui lòng chọn năm học trong danh sách.",
                    semesters: "Vui lòng điền học kỳ."
                }
            });
        });
    </script>
    <script>
        $("#button-remove-semester").confirm({
            title: "Xóa năm học?",
            text: "Bạn có chắn chắn xóa học kỳ? Ấn Yes để tiếp tục.",
            confirm: function(){
                $('form#btnRemoveSemester').submit();
                console.log('true');
            }   
        });
    </script>
@endsection
