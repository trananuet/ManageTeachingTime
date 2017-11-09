<style>
body {
    background-color: #f8f8f8;
}

#wrapper {
    width: 100%;
}

#page-wrapper {
    padding: 30px 15px 0 15px;
    min-height: 568px;
    background-color: #fff;
}

@media(min-width:768px) {
    #page-wrapper {
        position: inherit;
        margin-left: 250px;
        padding: 30px 30px 0 30px;
        border-left: 1px solid #e7e7e7;
    }
}

.navbar-header {
    float: left;
}

.navbar-left {
    float: left;
}

.navbar-right {
    text-align: right;
}

.navbar-top-links {
    margin: 0;
}

.navbar-top-links li {
    display: inline-block;
}

.navbar-top-links li:last-child {
    margin-right: 6px;
}

.navbar-top-links li a {
    padding: 15px;
    min-height: 50px;
}

.navbar-top-links>li>a {
    color: #999;
}

.navbar-top-links>li>a:hover, .navbar-top-links>li>a:focus, .navbar-top-links>.open>a, .navbar-top-links>.open>a:hover, .navbar-top-links>.open>a:focus {
    color: #fff;
    background-color: #222;
}

.navbar-top-links .dropdown-menu li {
    display: block;
}

.navbar-top-links .dropdown-menu li:last-child {
    margin-right: 0;
}

.navbar-top-links .dropdown-menu li a {
    padding: 3px 20px;
    min-height: 0;
}

.navbar-top-links .dropdown-menu li a div {
    white-space: normal;
}

.navbar-top-links .dropdown-messages,
.navbar-top-links .dropdown-tasks,
.navbar-top-links .dropdown-alerts {
    width: 310px;
    min-width: 0;
}

.navbar-top-links .dropdown-messages {
    margin-left: 5px;
}

.navbar-top-links .dropdown-tasks {
    margin-left: -59px;
}

.navbar-top-links .dropdown-alerts {
    margin-left: -123px;
}

.navbar-top-links .dropdown-user {
    right: 0;
    left: auto;
}

.sidebar .sidebar-nav.navbar-collapse {
    padding-right: 0;
    padding-left: 0;
}

.sidebar .sidebar-search {
    padding: 15px;
}

.sidebar ul li {
    border-bottom: 1px solid #e7e7e7;
}

.sidebar ul li a.active {
    background-color: #eee;
}

.sidebar .arrow {
    float: right;
}

.sidebar .fa.arrow:before {
    content: "\f104";
}

.sidebar .active>a>.fa.arrow:before {
    content: "\f107";
}

.sidebar .nav-second-level li,
.sidebar .nav-third-level li {
    border-bottom: 0!important;
}

.sidebar .nav-second-level li a {
    padding-left: 37px;
}

.sidebar .nav-third-level li a {
    padding-left: 52px;
}

@media(min-width:768px) {
    .sidebar {
        z-index: 1;
        position: absolute;
        width: 250px;
        margin-top: 51px;
    }

    .navbar-top-links .dropdown-messages,
    .navbar-top-links .dropdown-tasks,
    .navbar-top-links .dropdown-alerts {
        margin-left: auto;
    }
}

.btn-outline {
    color: inherit;
    background-color: transparent;
    transition: all .5s;
}

.btn-primary.btn-outline {
    color: #428bca;
}

.btn-success.btn-outline {
    color: #5cb85c;
}

.btn-info.btn-outline {
    color: #5bc0de;
}

.btn-warning.btn-outline {
    color: #f0ad4e;
}

.btn-danger.btn-outline {
    color: #d9534f;
}

.btn-primary.btn-outline:hover,
.btn-success.btn-outline:hover,
.btn-info.btn-outline:hover,
.btn-warning.btn-outline:hover,
.btn-danger.btn-outline:hover {
    color: #fff;
}

.chat {
    margin: 0;
    padding: 0;
    list-style: none;
}

.chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #999;
}

.chat li.left .chat-body {
    margin-left: 60px;
}

.chat li.right .chat-body {
    margin-right: 60px;
}

.chat li .chat-body p {
    margin: 0;
}

.panel .slidedown .glyphicon,
.chat .glyphicon {
    margin-right: 5px;
}

.chat-panel .panel-body {
    height: 350px;
    overflow-y: scroll;
}

.login-panel {
    margin-top: 25%;
}

.flot-chart {
    display: block;
    height: 400px;
}

.flot-chart-content {
    width: 100%;
    height: 100%;
}

.dataTables_wrapper {
    position: relative;
    clear: both;
}

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc,
table.dataTable thead .sorting_asc_disabled,
table.dataTable thead .sorting_desc_disabled {
    background: 0 0;
}

table.dataTable thead .sorting_asc:after {
    content: "\f0de";
    float: right;
    font-family: fontawesome;
}

table.dataTable thead .sorting_desc:after {
    content: "\f0dd";
    float: right;
    font-family: fontawesome;
}

table.dataTable thead .sorting:after {
    content: "\f0dc";
    float: right;
    font-family: fontawesome;
    color: rgba(50,50,50,.5);
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.428571429;
}

.btn-circle.btn-lg {
    width: 50px;
    height: 50px;
    padding: 10px 16px;
    border-radius: 25px;
    font-size: 18px;
    line-height: 1.33;
}

.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.show-grid [class^=col-] {
    padding-top: 10px;
    padding-bottom: 10px;
    border: 1px solid #ddd;
    background-color: #eee!important;
}


</style>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <form action="/Search" method="post">
                                {{csrf_field()}}
                                <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Tên ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </form>
                                
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('/') }}" class="active"><i class="fa fa-home fa-fw"></i> Trang chủ</a>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-manager"><i class="fa fa-sitemap fa-fw"></i> Danh mục</a>
                        <ul id="collapse-manager">
                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><a href="{{route('school_year')}}"> Năm học</a>
                            </li>
                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><a href=""> Học kỳ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#account"><i class="fa fa-sitemap fa-fw"></i> Lịch sử</a>
                        <ul id="account">
                            <li><i class="fa fa-history" aria-hidden="true"></i><a href=""> Lịch sử tìm kiếm</a></li>
                        </ul>
                    </li>
                </ul>


            </div>
        </div>
</div>
