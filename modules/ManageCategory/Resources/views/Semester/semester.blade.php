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
            <div class="school-top row">
                <div class="col-md-12">
                    <div class="form-group">
                        <hr>
                        <h3>Học kỳ</h3>
                        <hr>
                        <button data-toggle="modal" data-target="#modalSchoolYear" class="btn btn-primary">Thêm học kỳ</button>
                        <!-- LINE MODAL -->
                        <div class="modal fade" id="modalSchoolYear" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #cbffd1">
                                        <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h3 class="modal-title" id="lineModalLabel">QUẢN LÝ DANH MỤC</h3>
                                    </div>
                                    <form method="POST" action="{{route('school_year.save')}}">
                                    {{ csrf_field() }}
                                        <div class="modal-body" style="margin-bottom: 80px;">
                                            
                                            <!-- content goes here -->
                                            <div class="form-group">
                                                <label for="">Năm học</label>
                                                <select type="text" name="school_years" class="form-control" id="semester" placeholder="Năm học">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Active</label>
                                                <input type="text" name="active" class="form-control" id="activeYears" placeholder="Active">
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
                                                <div class="btn-group btn-delete hidden" role="group">
                                                    <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#school-years').DataTable();
    } );
</script>
@endsection
