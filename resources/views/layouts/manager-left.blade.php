<div style=" min-height: 100px">
    <a href="{{route('home')}}" class="logo-manage">
        <img src="{{asset('admin_uet/images/common/UET.png')}}" alt="Logo">
    </a>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default ">
            <div class="panel-heading panel-manager">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-manager">
                        <i class="fa fa-list" aria-hidden="true"></i> Danh mục
                    </a>
                </h4>
            </div>
            <div id="collapse-manager" class="panel-collapse collapse in">
                <div class="panel-body collapse-manager" style="padding: 10px;">
                    <ul id="collapse-manager">
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{route('school_year')}}"> Năm học</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href=""> Học kỳ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#account">
                        <i class="fa fa-history" aria-hidden="true"></i> Lịch sử
                    </a>
                </h4>
            </div>
            <div id="account" class="panel-collapse collapse">
                <div class="panel-body collapse-account" style="padding: 10px">
                    <ul id="collapse-account">
                        <li><i class="fa fa-id-card" aria-hidden="true"></i><a href=""> Lịch sử tìm kiếm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>