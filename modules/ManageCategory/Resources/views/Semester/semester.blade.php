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
        .table .text-name{
            text-align: left;
        }
    </style>
@endsection
@section('content')
        <h3>Học Kỳ</h3>
        <hr>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    <span>{{$errors->first('checkbox')}}</span>
                </div>
            @endif
            @if(Session::has('message'))
                    <div class="alert alert-danger">
                        <span>{{Session::get('message')}}</span>
                    </div>
            @endif 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel"> 
                <form method="POST" action="{{route('semester.filter')}}" id="formFilterYear">
                            {{ csrf_field() }}
                    <div class="filter col-md-8 row">
                        <label for="filterYear" class="col-sm-3 col-form-label label-filter">Năm học</label>
                        <div class="col-sm-6"> 
                            <select type="text" name="year" class="form-control input-filter" id="filterYear" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
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
                        </div>
                        <button type="submit" class="hidden"></button>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-md-4 add-btn">
                <button data-toggle="modal" data-target="#modalSemester" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
        </div>
            <!-- LINE MODAL -->
            <div class="modal fade" id="modalSemester" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div>
                        <ul class="nav nav-tabs nav-default" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ Excel</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">                                
                                <div class="modal-content" style="width: 100%;">
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
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="modal-content" style="width: 100%;">
                                    <form action="{{route('semester.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                        {{csrf_field()}}
                                    <div class="modal-body">
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
                                                <label for="yearIDFormCreate" class="col-sm-3 col-form-label">Import File</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="imported_file"/>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                                <label for="trainingCreate" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <b>Trường dữ liệu {name}</b>
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
        </div>
        @if(session('schoolYear') && session('semesterFilter'))
            <div class="semester-content-table relative">
                <form method="POST" action="{{route('semester.remove')}}" id="btnRemoveSemester">
                {{ csrf_field() }}
                <div class="box-remove-all">
                    {{--  <button type="button" class="btn btn-primary" id="btnRemoveAllSemester">Xóa nhiều năm học</button>
                    <button type="button" class="btn btn-primary hidden" id="btnActiveRemoveSemester">Xóa nhiều năm học</button>
                    <br>  --}}
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="removeSemesterActive" onclick="return confirm('Bạn chắc chắn muốn xóa học kỳ?');">Xóa</button>
                </div>
                <table class="table table-hover table-condensed table-bordered " id ="semester">
                    <thead class ="table-semester">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Năm học</th>
                            <th class="">Học kỳ</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('semesterFilter') as $semester)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td class="text-name">{{session('schoolYear')->name}}</td>
                                <td class="text-name">{{$semester->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSemester{{$semester->semesterID}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                    <td class="hidden-checkbox"><input type="checkbox" name="checkbox[]" id="{{$semester->semesterID}}" value="{{$semester->semesterID}}" class="checkbox-remove"></td>
                </form>
                            </tr>
                            <div class="modal fade" id="modalEditSemester{{$semester->semesterID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header">
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
                <div class="box-remove-all">
                    {{--  <button type="button" class="btn btn-primary" id="btnRemoveAllSemester">Xóa nhiều năm học</button>
                    <button type="button" class="btn btn-primary hidden" id="btnActiveRemoveSemester">Xóa nhiều năm học</button>
                    <br>  --}}
                    <button type="submit" class="btn btn-primary btn-remove pull-right" id="removeSemesterActive" onclick="return confirm('Bạn chắn chắn muốn xóa học kỳ?');">Xóa</button>
                </div>
                <table class="table table-hover table-condensed table-bordered " id ="semester">
                    <thead class ="table-semester">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Năm học</th>
                            <th class="">Học kỳ</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semesters as $semester)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td class="text-name">{{$semester->schoolYear}}</td>
                                <td class="text-name">{{$semester->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSemester{{$semester->semesterID}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    {{--  <form action="{{route('semester.delete',['semesterID' => $semester->semesterID])}}" method="POST" id="">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary del-one-year" id="" onclick="return confirm('Bạn chắn chắn muốn xóa học kỳ?');">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>  --}}
                                </td>
                                <td class="hidden-checkbox"><input type="checkbox" name="checkbox[]" id="{{$semester->semesterID}}" value="{{$semester->semesterID}}" class="checkbox-remove"></td>
                            </tr>
                </form>
                            <div class="modal fade" id="modalEditSemester{{$semester->semesterID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                    <div class="modal-header">
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

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#semester').dataTable( {
                "autoWidth": false
            });
        });
    </script>
    <script>   
        $(function() {
            $("#formSemesterCreate").validate({
                rules: {
                        yearID: "required", 
                        semesters: "required"
                    },
                messages: {
                        yearID: "Vui lòng chọn năm học.",
                        semesters: "Vui lòng điền học kỳ."
                        
                }
            });
        });
    </script> 
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        yearID: "required", 
                        imported_file: "required"
                    },
                messages: {
                        yearID: "Vui lòng chọn năm học.",
                        imported_file: "Vui lòng nhập file."
                        
                }
            });
        });
    </script> 
    <script>
        $(function() {
            $('#btnRemoveAllSemester').click(function(){
                $('.active-display').addClass('hidden');
                $('.hidden-checkbox').removeClass('hidden');
                $('#removeSemesterActive').removeClass('hidden');
                $('#btnActiveRemoveSemester').removeClass('hidden');
                $(this).addClass('hidden');
                
            });
            $('#btnActiveRemoveSemester').click(function(){
                   $('.hidden-checkbox').addClass('hidden');
                   $('.active-display').removeClass('hidden');
                   $('#removeSemesterActive').addClass('hidden');
                   $('#btnRemoveAllSemester').removeClass('hidden');
                   $(this).addClass('hidden');
            });
        });
    </script>
    <script>
        /*$("#button-remove-semester").confirm({
            title: "Xóa năm học?",
            text: "Bạn có chắn chắn xóa học kỳ? Ấn Yes để tiếp tục.",
            confirm: function(){
                $('form#btnRemoveSemester').submit();
                console.log('true');
            }   
        });*/
    </script>
@endsection
