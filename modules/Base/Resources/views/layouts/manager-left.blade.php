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
                                <a href="{{route('training')}}"> Hệ đào tạo</a>
                            </li>
                            <li>
                                <a href="{{route('school_year')}}"> Năm học</a>
                            </li>
                            <li>
                                <a href="{{route('semester')}}"> Học kỳ</a>
                            </li>
                            <li>
                                <a href="{{route('title')}}"> Chức danh</a>
                            </li>
                            <li>
                                <a href="#"> Khoa, phòng ban</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::user()->checkMod())
                    <li>
                        <a href="#"> Quản lí hệ thống<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        	<li>
                                <a href="{{route('manage_system')}}"> Vai trò</a>
                            </li>
                            <li>
                                <a href="{{route('manage_users')}}"> Người dùng</a>
                            </li>
                            <li>
                                <a href="{{route('manage_functions')}}"> Chức năng</a>
                            </li>
                            <li>
                                <a href="{{route('manage_permission')}}"> Phân quyền</a>
                            </li>
                            <li>
                                <a href="#"> Nhật ký</a>
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
                    @endif
                </ul>

            </div>
        </div>
