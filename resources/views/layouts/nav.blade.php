<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="{{route('home')}}"> UET </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="nav-list">
                <li class="active" id="homepage"><a href="{{route('home')}}">Trang chủ</a></li>
                {{--  <li id=""><a href="">Danh sách</a></li>  --}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="" ><span><i class="fa fa-user-plus" aria-hidden="true"></i></span> Tài khoản</a></li>
            </ul>
        </div>
    </div>
</nav>