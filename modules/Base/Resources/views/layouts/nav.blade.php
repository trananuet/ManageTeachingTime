<style>
    .navbar-inverse {
    background-color: #e5e5e5;
    border-color: white;
    }
    a:active {
        background: #007f7f!important;
        color: white;
    }
    a:hover {
        background: #007f7f!important;
        color: white;
    }
    .aim {
        background: #e5e5e5;
        color: white;
    }
    a {
        color: #333;
    }
    .alogin {
        background: white;
    }
</style>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <span class="navbar-brand" style="color: #e5e5e5;"> .</span>
            <img  class="pull-left" src="{{asset('admin_uet/images/common/dhcn.png')}}" alt="Logo" style="height: 50px;">   
             <span class="navbar-brand" style="color: #007f7f;"> Hệ thống quản lí giờ giảng</span>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
           @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <span class="aim dropdown-toggle" style="line-height: 50px;" data-toggle="dropdown"><span style="color: #007f7f;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span><span class="caret"></span></span></span>
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
        </ul>
    </nav>