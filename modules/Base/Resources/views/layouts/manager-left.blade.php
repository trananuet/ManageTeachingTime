 <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{ url('/') }}" class="active"> Trang chủ</a>
                    </li>
                    <li>
                        <a href="#"> Danh mục<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('school_year')}}"> Năm học</a>
                            </li>
                            <li>
                                <a href="{{route('semester')}}"> Học kỳ</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"> Lịch sử<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"> Lịch sử tìm kiếm</a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
