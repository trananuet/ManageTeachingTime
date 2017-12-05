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
        .toggle{
            width: 100px!important;
            height: 10px!important;
            float: right;
        }
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: left;
        }
    </style>
@endsection
@section('content')
@include('base::layouts.manager-left')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="box-top row">
                <h3>Năm học</h3>
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
                </div>
                <div class="row"> 
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
                </div>
                <div class="row">
                    <div class="col-md-4 add-btn">
                        <button data-toggle="modal" data-target="#modalSchoolYear" class="btn btn-primary"><b>+ Thêm</b></button>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- LINE MODAL -->
                <div class="modal fade" id="modalSchoolYear" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <ul class="nav nav-tabs" role="tablist" >
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                            <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm dữ liệu từ excel</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                                                
                                <div class="modal-content" style="width: 100%;">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h4>
                                    </div>
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
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="lineModalLabel">Thêm dữ liệu từ excel</h4>
                                    </div>
                                    <form action="{{route('school_year.import')}}" method="post" enctype="multipart/form-data">
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
                                                    <input type="file" name="imported-file"/>
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
                                    <td>{{session('training')->name}}</td>
                                    <td>{{$schoolyear->name}}</td>
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
                                <th class="act">Kích hoạt</th>
                                <th class="cus">Tùy chọn</th>
                                <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($school_years as $schoolyear)
                                <tr>
                                    <td class="active-display">{{++$loop->index}}</td>
                                    <td>{{$schoolyear->training}}</td>
                                    <td>{{$schoolyear->name}}</td>
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
        </div>
    </div>
</div>
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
                    school_years: "required"
                    },
                messages: {
                    school_years: "Vui lòng điền năm học."
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