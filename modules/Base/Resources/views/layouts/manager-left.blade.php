 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ url('/') }}" class="active"> Trang chủ</a>
            </li>
            <li>
                <a href="#"> Danh mục<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                @if(Auth::user()->checkManageTraining())
                    <li>
                        <a href="{{route('training')}}"> Hệ đào tạo</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageSchoolYear())
                    <li>
                        <a href="{{route('school_year')}}"> Năm học</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageSemester())
                    <li>
                        <a href="{{route('semester')}}"> Học kỳ</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageTitle())
                    <li>
                        <a href="{{route('title')}}"> Chức danh</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageFaculty())
                    <li>
                        <a href="{{route('faculty')}}"> Khoa, phòng ban</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageTeacher())
                    <li>
                        <a href="{{route('teacher')}}"> Giảng viên</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageCourse())
                    <li>
                        <a href="{{route('courses')}}"> Môn học</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageThesis())
                    <li>
                        <a href="{{route('thesis')}}"> Khóa luận</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageSalary())
                    <li>
                        <a href="{{route('salary')}}"> Định mức chi trả</a>
                    </li>
                @endif
                </ul>
            </li>
            <li>
                <a href="#">Thống kê giờ dạy<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                @if(Auth::user()->checkManageCourseLecturer())                        
                    <li>
                        <a href="{{route('course_lecturer')}}"> Giảng viên môn học</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageThesisLecturer())
                    <li>
                        <a href="{{route('thesis_lecturer')}}"> Giảng viên khóa luận</a>
                    </li>
                @endif
                    <li>
                        <a href="{{route('statistic')}}"> Thống kê giờ dạy</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->checkMod())
            <li>
                <a href="#"> Quản lí hệ thống<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                @if(Auth::user()->checkManageAccess())
                    <li>
                        <a href="{{route('manage_access')}}"> Vai trò</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageUser())
                    <li>
                        <a href="{{route('manage_users')}}"> Người dùng</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageFunctions())
                    <li>
                        <a href="{{route('manage_functions')}}"> Chức năng</a>
                    </li>
                @endif
                @if(Auth::user()->checkManagePermission())
                    <li>
                        <a href="{{route('manage_permission')}}"> Phân quyền</a>
                    </li>
                @endif
                @if(Auth::user()->checkManageHistory())
                    <li>
                        <a href="#"> Nhật ký</a>
                    </li>
                @endif
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