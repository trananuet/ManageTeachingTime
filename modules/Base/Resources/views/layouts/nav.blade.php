<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="{{ url('/') }}" class="site_title"><img  class="pull-left" src="{{asset('admin_uet/images/common/dhcn.png')}}" alt="Logo" style="height: 50px;"> <span style="font-size: 14px;">Hệ thống quản lí giờ giảng</span></a>
        </div>

        <div class="clearfix"></div>
        <!-- sidebar menu -->
        @if(Auth::check())
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Tùy chọn</h3>
            <ul class="nav side-menu">
              <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Trang chủ </a></li>
              <li><a><i class="fa fa-edit"></i> Danh mục <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                @if(Auth::user()->checkManageTraining())
                  <li><a href="{{route('training')}}">Hệ đào tạo</a></li>
                @endif
                @if(Auth::user()->checkManageSchoolYear())
                  <li><a href="{{route('school_year')}}">Năm học</a></li>
                @endif
                @if(Auth::user()->checkManageSemester())
                  <li><a href="{{route('semester')}}">Học kỳ</a></li>
                @endif
                @if(Auth::user()->checkManageTitle())
                  <li><a href="{{route('title')}}">Chức danh</a></li>
                @endif
                @if(Auth::user()->checkManageFaculty())
                  <li><a href="{{route('faculty')}}">Khoa, phòng ban</a></li>
                @endif
                @if(Auth::user()->checkManageTeacher())
                  <li><a href="{{route('teacher')}}">Giảng viên</a></li>
                @endif
                @if(Auth::user()->checkManageCourse())
                  <li><a href="{{route('courses')}}">Môn học</a></li>
                @endif
                @if(Auth::user()->checkManageThesis())
                  <li><a href="{{route('thesis')}}">Kiểu đề tài</a></li>
                @endif
                @if(Auth::user()->checkManageSalary())
                  <li><a href="{{route('salary')}}">Định mức chi trả</a></li>
                @endif
                </ul>
              </li>
              <li><a><i class="fa fa-bar-chart-o"></i> Nhập dữ liệu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{route('teach')}}">Số liệu giảng dạy</a></li>
                    {{--  @if(Auth::user()->checkManageCourseLecturer())      --}}
                  {{--  <li><a href="{{route('course_lecturer')}}">Số liệu giờ giảng</a></li>  --}}
                  {{--  @endif  --}}
                    {{--  @if(Auth::user()->checkManageThesisLecturer())  --}}
                  <li><a href="{{route('guide')}}">Số liệu hướng dẫn</a></li>
                    {{--  @endif  --}}
                  {{--  <li><a href="{{route('statistic')}}">Thống kê giờ dạy</a></li>  --}}
                </ul>
              </li>
              <li><a><i class="fa fa-bar-chart-o"></i> Thống kê giờ dạy <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  @if(Auth::user()->checkManageCourseLecturer())    
                    <li><a href="{{route('course_lecturer')}}">Thống kê giờ dạy giảng vien</a></li>
                  @endif
                  @if(Auth::user()->checkManageThesisLecturer())
                    <li><a href="{{route('thesis_lecturer')}}">Thống kê đề tài hướng dẫn</a></li>
                  @endif
                  {{--  <li><a href="{{route('statistic')}}">Thống kê giờ dạy</a></li>  --}}
                </ul>
              </li>
              @if(Auth::user()->checkMod())
              
              <li><a><i class="fa fa-clone"></i>Quản lí hệ thống <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if(Auth::user()->checkManageAccess())
                  <li><a href="{{route('manage_access')}}">Vai trò</a></li>
                  @endif
                    @if(Auth::user()->checkManageUser())
                  <li><a href="{{route('manage_users')}}">Người dùng</a></li>
                    @endif
                    @if(Auth::user()->checkManageFunctions())
                  <li><a href="{{route('manage_functions')}}">Chức năng</a></li>
                  @endif
                    @if(Auth::user()->checkManagePermission())
                  <li><a href="{{route('manage_permission')}}">Phân quyền</a></li>
                  @endif
                    @if(Auth::user()->checkManageHistory())
                  <li><a href="#">Nhật ký</a></li>
                  @endif
                </ul>
              </li>
              <li><a><i class="fa fa-history"></i>Lịch sử<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Lịch sử tìm kiếm</a></li>
              </li>
              @endif
            </ul>
          </div>
        </div>
        @endif
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
      </div>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="images/img.jpg" alt="">{{ Auth::user()->name }}
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Thông tin</a></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
              </ul>
            </li>
            @endif
            </ul>
        </nav>
      </div>
    </div>
        

