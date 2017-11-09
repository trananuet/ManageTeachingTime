<style>
    .navbar-inverse {
    background-color: #56aaff;
    border-color: #56aaff;
    }
    a:hover {
        color: black;
    }
</style>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="{{asset('admin_uet/images/common/dhcn.png')}}" alt="Logo" style="height: 50px;">     
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
    </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <span class="navbar-brand" style="color: white;">Hệ thống quản lí giờ giảng</span>
            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i>{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#"><i class="fa fa-address-card-o" aria-hidden="true"></i> Thông tin</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

        </div>
    </div>
</nav>