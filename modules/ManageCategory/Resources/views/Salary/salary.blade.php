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
                <br>
                <h3>Định mức chi trả</h3>
                <hr>
                @if($errors->has('checkbox'))
                    <div class="alert alert-danger">
                        <span>{{$errors->first('checkbox')}}</span>
                    </div>
                @endif 
                    <div class="add-btn col-md-2">
                        <button data-toggle="modal" data-target="#modalSalary" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
                    </div>
                <!-- LINE MODAL -->
                <div class="modal fade" id="modalSalary" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="addExcel">
                        <ul class="nav nav-tabs nav-default" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm dữ liệu nhập tay</a></li>
                        </ul>
                        </div>
                        <div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">                                
                                    <div class="modal-content" style="width: 100%;">
                                        <form method="POST" action="{{route('salary.save')}}" id="formSalaryCreate">
                                        {{ csrf_field() }}
                                            <div class="modal-body">
                                                <!-- content goes here -->
                                                <div class="form-group row">
                                                    <label for="salaryCreate" class="col-sm-3 col-form-label">Tên </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" id="salaryCreate" placeholder="Họ tên">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for=" " class="col-sm-3 col-form-label">Chức danh </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="title" style="color: #000;" >
                                                            <option value="">Chọn chức danh</option>
                                                            @foreach($titles as $title)
                                                                <option value="{{$title->id}}">{{$title->name}}</option>
                                                            @endforeach
                                                        </select>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="school-content-table relative">
                <form method="POST" action="{{route('salary.remove')}}">
                    {{ csrf_field() }}
                    <div class="box-remove-all">
                        <button type="submit" class="btn btn-primary btn-remove pull-right" id="" onclick="return confirm('Bạn chắn chắn muốn xóa khoa, phòng ban đã chọn?');">Xóa</button>
                    </div>
                <table class="table table-hover table-condensed table-bordered" id="table_training">
                    <thead class ="table-school-year">
                        <tr>
                            <th class="stt active-display">STT</th>
                            <th class="">Tên</th>
                            <th class="">Chức danh</th>
                            <th class="">Định mức</th>
                            <th class="cus">Tùy chọn</th>
                            <th class="stt"><input type="checkbox" id="checkbox-all" value="" class="checkbox-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salarys as $salary)
                            <tr>
                                <td class="active-display">{{++$loop->index}}</td>
                                <td>{{$salary->name}}</td>
                                <td>{{$salary->titleName}}</td>
                                <td>{{$salary->titleQuota}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditSalary{{$salary->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class=""><input type="checkbox" name="checkbox[]" id="{{$salary->id}}" value="{{$salary->id}}" class="checkbox-remove"></td>
                 </form>
                            </tr>
                            <div class="modal fade" id="modalEditSalary{{$salary->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width: 80%; margin-left: 10%;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="lineModalLabel">CHỈNH SỬA DANH MỤC</h4>
                                        </div>
                                        <form method="POST" action="{{route('salary.save')}}" id="formsalaryEdit">
                                            {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <!-- content goes here -->
                                                    <input type="hidden" name="id" value="{{$salary->id}}">
                                                    <div class="form-group row">
                                                        <label for="salaryEdit" class="col-sm-3 col-form-label">Tên</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="name" class="form-control" id="salaryEdit" placeholder="Tên" value="{{$salary->name}}" required>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Chức danh</label>
                                                    <div class="col-sm-9">
                                                        <select type="text" name="title" class="form-control" id="" required>
                                                            <option value="">Chọn chức danh</option>
                                                            @foreach($titles as $title)
                                                                @php
                                                                    $selectTitle = $title->id == $salary->id ? "selected" : null;
                                                                @endphp
                                                                <option value="{{$title->id}}" {{$selectTitle}}>{{$title->name}}</option>
                                                            @endforeach
                                                        </select>
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
   <script>   
        $(function() {
            $("#formSalaryCreate").validate({
                rules: {
                        name: "required", 
                        title: "required"
                    },
                messages: {
                        name: "Vui lòng điền tên chức danh.",
                        title: "Vui lòng chọn chức danh."
                }
            });
        });
    </script> 
@endsection
