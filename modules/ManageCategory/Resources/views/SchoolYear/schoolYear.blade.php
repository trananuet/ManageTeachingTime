@extends('base::layouts.master')
@section('nav')
	@include('base::layouts.nav')
@endsection
@section('content')
@include('base::layouts.manager-left')

        <h3>Năm Học</h3>
        <hr>
            <div class="row">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}
                        @endforeach
                    </div>
                @endif 
                {{--  @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <strong>{{$errors->first('checkbox')}}</strong>
                    </div>
                @endif   --}}
                @if(Session::has('message'))
                    <div class="alert alert-danger">
                        <span>{{Session::get('message')}}</span>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <span>{{Session::get('success')}}</span>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="dashboard_graph x_panel"> 
                <form method="POST" action="{{route('school_year.filter')}}" id="formFilterTraining">
                            {{ csrf_field() }}
                    <div class="filter col-md-8 row">
                        <label for="filterTraining" class="col-sm-3 col-form-label label-filter">Hệ đào tạo</label>
                        <div class="col-sm-6"> 
                            <select type="text" name="training" class="form-control input-filter" id="filterTraining" style="color: #000;" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="">Chọn hệ đào tạo</option>
                                @foreach($trainings as $training)
                                    @if(session('training') && session('trainingFilter'))
                                    @php
                                        $selectTraining = $training->trainingID == session('training')->trainingID ? "selected" : null;
                                    @endphp
                                    <option value="{{$training->trainingID}}" {{$selectTraining}}>{{$training->name}}</option>
                                    @else
                                    <option value="{{$training->trainingID}}">{{$training->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="hidden"></button>
                    </div>
                </form>
                <div class="remove-btn-session-other">
                    <a href="{{route('remove_filter.remove_session')}}">
                        <button class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Xóa bộ lọc</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 add-btn">
                <button data-toggle="modal" data-target="#modalSchoolYear" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            </div>
        </div>
            <!-- LINE MODAL -->
            <div class="modal fade" id="modalSchoolYear" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="addExcel">
                        <ul class="nav nav-tabs nav-default" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
                        </ul>
                    </div>
                    <div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="modal-content" style="width: 100%;">
                                <form method="POST" action="{{route('school_year.save')}}" id="formSchoolYearCreate">
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                        <!-- content goes here -->
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                            <div class="col-sm-9">
                                                <select type="text" name="trainingID" class="form-control" id="" style="color: #000;">
                                                    <option value="">Chọn hệ đào tạo</option>
                                                    @foreach($trainings as $training)
                                                        <option value="{{$training->trainingID}}">{{$training->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="schoolYearCreate" class="col-sm-3 col-form-label">Năm học: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="school_years" class="form-control" id="schoolYearCreate" placeholder="Năm học">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="activeYearsCreate" class="col-sm-3 col-form-label">Kích hoạt: </label>
                                            <div class="col-sm-9">
                                                <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeYearsCreate">
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
                                <form action="{{route('school_year.import')}}" method="post" enctype="multipart/form-data" id="importExcel">
                                {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                            <div class="col-sm-9">
                                                <select type="text" name="trainingID" class="form-control" id="" style="color: #000;">
                                                    <option value="">Chọn hệ đào tạo</option>
                                                    @foreach($trainings as $training)
                                                        <option value="{{$training->trainingID}}">{{$training->name}}</option>
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
                                            <label for="" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <b>Trường dữ liệu {name,active}</b>
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
        @if(session('trainingFilter') && session('training'))
            <div class="school-content-table relative">
                <form method="POST" action="{{route('school_year.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="removeYearActive" onclick="return confirm('Bạn chắn chắn muốn xóa năm học?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="school-years">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Hệ đào tạo</th>
                            <th class="">Năm học</th>
                            <th class="">Kích hoạt</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('trainingFilter') as $schoolyear)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td class="text-name">{{session('training')->name}}</td>
                                <td class="text-name">{{$schoolyear->name}}</td>
                                @if($schoolyear->active == 1)
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                @else
                                    <td></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSchoolYear{{$schoolyear->yearID}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$schoolyear->yearID}}" value="{{$schoolyear->yearID}}" class="checkbox-remove"></td>
                </form>
                            </tr>
                            <div class="modal fade" id="modalEditSchoolYear{{$schoolyear->yearID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('school_year.save')}}" id="formSchoolYearEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="yearID" value="{{$schoolyear->yearID}}">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                                    <div class="col-sm-9">
                                                        <select type="text" name="trainingID" class="form-control" id="" required>
                                                            <option value="">Chọn hệ  đào tạo</option>
                                                            @foreach($trainings as $training)
                                                                @php
                                                                    $selectTraining = $training->trainingID == $schoolyear->trainingID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$training->trainingID}}" {{$selectTraining}}>{{$training->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="schoolYearEdit" class="col-sm-3 col-form-label">Năm học</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="school_years" class="form-control" id="schoolYearEdit" placeholder="Năm học" value="{{$schoolyear->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="activeYearsEdit" class="col-sm-3 col-form-label">Active</label>
                                                    <div class="col-sm-9">
                                                        @php
                                                            if($schoolyear->active == 1){
                                                                $selectBtn = 'checked';
                                                            } else {
                                                                $selectBtn = null;
                                                            }
                                                        @endphp
                                                        <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeYearsEdit" {{$selectBtn}}>
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
            <div class="school-content-table relative">
                <form method="POST" action="{{route('school_year.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="removeYearActive" onclick="return confirm('Bạn chắn chắn muốn xóa năm học?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="school-years">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Hệ đào tạo</th>
                            <th class="">Năm học</th>
                            <th class="">Kích hoạt</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($school_years as $schoolyear)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td class="text-name">{{$schoolyear->training}}</td>
                                <td class="text-name">{{$schoolyear->name}}</td>
                                @if($schoolyear->active == 1)
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                @else
                                    <td></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSchoolYear{{$schoolyear->yearID}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$schoolyear->yearID}}" value="{{$schoolyear->yearID}}" class="checkbox-remove"></td>
                </form>
                            </tr>
                            <div class="modal fade" id="modalEditSchoolYear{{$schoolyear->yearID}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('school_year.save')}}" id="formSchoolYearEdit">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <input type="hidden" name="yearID" value="{{$schoolyear->yearID}}">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Hệ đào tạo</label>
                                                    <div class="col-sm-9">
                                                        <select type="text" name="trainingID" class="form-control" id="" required>
                                                            <option value="">Chọn hệ  đào tạo</option>
                                                            @foreach($trainings as $training)
                                                                @php
                                                                    $selectTraining = $training->trainingID == $schoolyear->trainingID ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$training->trainingID}}" {{$selectTraining}}>{{$training->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="schoolYearEdit" class="col-sm-3 col-form-label">Năm học</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="school_years" class="form-control" id="schoolYearEdit" placeholder="Năm học" value="{{$schoolyear->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="activeYearsEdit" class="col-sm-3 col-form-label">Active</label>
                                                    <div class="col-sm-9">
                                                        @php
                                                            if($schoolyear->active == 1){
                                                                $selectBtn = 'checked';
                                                            } else {
                                                                $selectBtn = null;
                                                            }
                                                        @endphp
                                                        <input class="checkbox-common" type="checkbox" name="active" value ="1" id="activeYearsEdit" {{$selectBtn}}>
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
<div class="space">&nbsp;</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#school-years').dataTable( {
            "autoWidth": false
            });
        } );
    </script>
    <script>   
        $(function() {
            $("#formSchoolYearCreate").validate({
                rules: {
                        school_years: "required", 
                        trainingID: "required"
                    },
                messages: {
                        school_years: "Vui lòng điền năm học.",
                        trainingID: "Vui lòng chọn hệ đào tạo"
                }
            });
        });
    </script>
    <script>   
        $(function() {
            $("#importExcel").validate({
                rules: {
                        imported_file: "required", 
                        trainingID: "required"
                    },
                messages: {
                        imported_file: "Vui lòng chọn file.",
                        trainingID: "Vui lòng chọn hệ đào tạo"
                }
            });
        });
    </script>  
    <script>
        /*$("#button-remove-year").confirm({
            title: "Xóa năm học?",
            text: "Bạn có chắn chắn xóa năm học? Ấn Yes để tiếp tục.",
            confirm: function(){
                $('form#remove-scl-year').submit();
                console.log('true');
            }   
        });
            $("#button-remove-year-one").confirm({
                title: "Xóa năm học?",
                text: "Bạn có chắn chắn xóa năm học? Ấn Yes để tiếp tục.",
                confirm: function(){
                    $('form#delYear'+i).submit();
                }   
            });
                    console.log('form#delYear'+i);
        */
    </script>
    {{--  <script>
        $(function() {
            $('#btnRemoveAllYear').click(function(){
                $('.active-display').addClass('hidden');
                $('.hidden-checkbox').removeClass('hidden');
                $('#removeYearActive').removeClass('hidden');
                $('#btnRemoveClass').removeClass('hidden');
                $(this).addClass('hidden');
                
            });
            $('#btnRemoveClass').click(function(){
                   $('.hidden-checkbox').addClass('hidden');
                   $('.active-display').removeClass('hidden');
                   $('#removeYearActive').addClass('hidden');
                   $('#btnRemoveAllYear').removeClass('hidden');
                   $(this).addClass('hidden');
            });
        });
    </script>  --}}
    <script>
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
            })
    </script>
@endsection