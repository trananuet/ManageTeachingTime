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
    <h3>Số liệu đề tài hướng dẫn</h3>
    <hr>
    @if($errors->has('checkbox'))
        <div class="alert alert-danger">
            <span>{{$errors->first('checkbox')}}</span>
        </div>
    @endif 
    <div class="col-md-4 add-btn-1">
        <button data-toggle="modal" data-target="#modalDataGuide" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
    </div>
    <!-- LINE MODAL -->
        <div class="modal fade" id="modalDataGuide" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">                                
                        <div class="modal-content" style="width: 100%;">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="lineModalLabel">NHẬP SỐ LIỆU HƯỚNG DẪN</h4>
                            </div>
                            <form method="POST" action="{{route('guide.save')}}" id="formDataGuideCreate">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="">
                                <div class="modal-body">
                                    <!-- content goes here -->
                                    <div class="form-group row">
                                        <label for=" " class="col-sm-3 col-form-label">Giảng viên </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="teacherID" style="color: #000;">
                                                <option value="">Chọn giảng viên</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @foreach($arr as $thesis)
                                        <div class="form-group row">
                                            <label for=" " class="col-sm-3 col-form-label">{{$thesis}}<span style="font-size: 17px;color: #f62525;"> *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="type[]" class="form-control" id="" placeholder="Số đề tài {{$thesis}}" required value="0">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group row">
                                        <span style="font-size: 17px;color: #f62525;"> *</span><span>Số lượng đề tài hướng dẫn</span>
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
            </div>
        </div>
    </div> 
<div class="content-table relative">
    <form method="POST" action="{{route('guide.remove')}}">
        {{ csrf_field() }}
        <div class="box-remove-all">
            <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa số liệu hướng dẫn của giảng viên đã chọn?');">Xóa</button>
        </div>
    <table class="table table-hover table-condensed table-bordered" id="table_training">
        <thead class ="table-school-year">
            <tr>
                <th class="stt active-display">STT</th>
                <th class="">Giảng viên</th>
                @foreach($arr as $thesis)
                <th id="{{$thesis}}">{{$thesis}}</th>
                @endforeach
                <th class="">Số lượng</th>
                <th class="cus">Tùy chọn</th>
                <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($array as $key => $thesis_lecturer)
            <tr>
                <td class="active-display">{{++$loop->index}}</td>
                <td>{{$key}}</td>
                @foreach($arr as $thesis)
                    @php
                            for($i=0; $i < count($thesis_lecturer); $i++){
                                if($thesis_lecturer[$i]['type'] == $thesis){
                                    $str = $thesis_lecturer[$i]['quantity'];
                                    
                                    break;
                                }
                                else {
                                    $str = "0";
                                }
                            }
                    @endphp
                    <td> {{$str}}</td>
                @endforeach
                @php
                    $a = 'quantity';
                    $sum = sum_array($thesis_lecturer, $a);
                @endphp
                <td>{{$sum}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditDataGuide{{$thesis_lecturer[0]['id']}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </td>
                <td class=""><input type="checkbox" name="checkbox[]" id="{{$thesis_lecturer[0]['id']}}" value="{{$thesis_lecturer[0]['id']}}" class="checkbox-remove"></td> 
    </form>
            </tr>
                    <div class="modal fade" id="modalEditDataGuide{{$thesis_lecturer[0]['id']}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 80%; margin-left: 10%;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA SỐ LIỆU HƯỚNG DẪN</h4>
                            </div>
                            <form method="POST" action="{{route('guide.save')}}" id="formDataGuideEdit">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <!-- content goes here -->
                                    <input type="hidden" name="id" value="{{$thesis_lecturer[0]['id']}}">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Giảng viên</label>
                                        <div class="col-sm-9">
                                            <select type="text" name="teacherID" class="form-control" id="" required>
                                                <option value="">Chọn giảng viên</option>
                                                @foreach($teachers as $teacher)
                                                    @php
                                                        $selectTeacher = $teacher->id == $thesis_lecturer[0]['id'] ? "selected" : null;
                                                    @endphp
                                                <option value="{{$teacher->id}}" {{$selectTeacher}}>{{$teacher->name}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    @foreach($arr as $thesis)
                                        @php
                                                for($i=0; $i < count($thesis_lecturer); $i++){
                                                    if($thesis_lecturer[$i]['type'] == $thesis){
                                                        $str = $thesis_lecturer[$i]['quantity'];
                                                        break;
                                                    }
                                                    else {
                                                        $str = "0";
                                                    }
                                                }
                                        @endphp
                                        <div class="form-group row">
                                            <label for=" " class="col-sm-3 col-form-label">{{$thesis}}<span style="font-size: 17px;color: #f62525;"> *</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="type[]" class="form-control" id="" placeholder="{{$thesis}}" value="{{$str}}" required>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group row">
                                        <span style="font-size: 17px;color: #f62525;"> *</span><span>Số lượng đề tài hướng dẫn</span>
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
    <div class="space">&nbsp;</div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#table_training').dataTable( {
                "autoWidth": false
            });
        });
    </script>
   {{--  <script>   
        $(function() {
            $("#formThesisLecturerCreate").validate({
                rules: {
                        trainingID: "required", 
                        teacherID: "required",
                        thesisID: "required",
                        number: "required"
                    },
                messages: {
                        trainingID: "Vui lòng chọn hệ đào tạo.",
                        teacherID: "Vui lòng chọn giảng viên.",
                        thesisID: "Vui lòng chọn khóa luận.",
                        number: "Vui lòng điền số lượng."
                }
            });
        });
    </script>   --}}
@endsection
