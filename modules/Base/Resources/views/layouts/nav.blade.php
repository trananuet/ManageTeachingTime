<style>
    .navbar-inverse {
    background-color: #b82126;
    border-color: #080808;
    }

    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:focus,
    .navbar-inverse .navbar-nav>.active>a:hover {
        color: #fff;
        background-color: #e27d19;
    }

    .navbar-inverse .navbar-nav>.open>a,
    .navbar-inverse .navbar-nav>.open>a:focus,
    .navbar-inverse .navbar-nav>.open>a:hover {
        color: #fff;
        background-color: #e27d19;
    }

    .navbar-inverse .navbar-nav>li>a {
        color: #ffb9b9;
    }

    .navbar-inverse .navbar-brand {
        color: #ffb9b9;
        font-size: 25px;
    }

    .navbar-nav li:hover {
        background: #ce6a08;
    }

</style>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <img src="{{asset('admin_uet/images/common/UET.png')}}" alt="Logo" style="height: 50px;">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="nav-list">
                <li class="active" id="homepage" style="margin-left: 25px;"><a href="{{route('home')}}">HỆ THỐNG QUẢN LÝ GIỜ GIẢNG</a></li>
            </ul>
            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="" ><span><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}</span></a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>