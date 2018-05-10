<?php

namespace Modules\Data\Http\Controllers\Teach;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Data\Entities\CourseLecturer;
use Modules\ManageCategory\Entities\Semester;
use Modules\Data\Repositories\DataTeachRepository;
use Modules\ManageCategory\Repositories\CoursesRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\Data\Entities\DataTeach;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;
use Excel;

class TeachController extends Controller
{
    public function getTeach()
    {
        $teachers = TeacherRepository::getAllTeacher();
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::get_school_active();
        $data_teaches = DataTeachRepository::get_all_data_teaching();

        // if(Auth::user()->checkTeacher()){
        //             $course_lecturers =CourseLecturer::selectRaw("course_lecturers.*,semesters.name as semesterName")
        //             ->leftjoin('semesters','semesters.semesterID','=','course_lecturers.semesterID')
        //             ->where('teacherName',Auth::user()->name)
        //             ->get();
        // } else {
        //     $course_lecturers = TeachRepository::getAllCourseLecturer();
        // }
        return view('data::Teach.teach',compact('data_teaches','teachers','courses','semesters','school_years'));
    }

    

    public function createEditDataTeach(Request $request)
    {
        $data_teach = DataTeachRepository::save_data_teach($request);
        if($data_teach == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function removelDataTeach(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn giảng viên môn học nào.!!!'
        ]);
        $data_teach = DataTeachRepository::remove_data_teach($request);
        if($data_teach == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


     public function filterCourseLecturer(Request $request){
        $semester = $request->semester;
        $semesterFilter = Semester::find($semester)->course_lecturers()->get();
        $semester = Semester::find($semester);
        session()->flash('semesterFilter', $semesterFilter);
        session()->flash('semester', $semester);
        return redirect()->back();
    }

    public function postImport(Request $request)
    {
        if($request->file('imported_file'))
        {
            $path = $request->file('imported_file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
            })->get();
            // if (($request->file('imported-file')->getClientOriginalExtension()) != 'xlsx') {
            //     return redirect('')->with('error','File có thể không hỗ trợ nhập dữ liệu');
            // } else {

                if(!empty($data) && $data->count())
                {
                    foreach ($data->toArray() as $rows)
                    {
                        if(!empty($rows))
                        {
                            foreach($rows as $row) {
                                if($row['tengv'] !=  "" 
                                    && $row['monhoc'] != "" )
                                {
                                    $dataArray[] =
                                    [
                                        'semesterID' => $request->semester,
                                        'teacherName' => $row['tengv'],
                                        'courseName' => $row['monhoc'],
                                        'number_of_students' => number_format($row['so_sv'], 0, '.', ','),
                                        'course_group' => $row['nhom'],
                                        'theory_group' => $row['nhom_lt'],
                                        'number_student_theory' => number_format($row['siso_lythuyet'], 0, '.', ','),
                                        'sum_theory_hour' => $row['sogio_lythuyet'],
                                        'theory_in_hour' => $row['tronggio_lt'],
                                        'theory_overtime' => $row['ngoaigio_lt'],
                                        'theory_day_off' => $row['ngaynghi_lt'],
                                        'practice_group' => $row['nhom_th'],
                                        'number_student_practice' => $row['siso_thuchanh'],
                                        'sum_practice_hour' => $row['sogio_thuchanh'],
                                        'practice_in_hour' => $row['tronggio_th'],
                                        'practice_overtime' => $row['ngoaigio_th'],
                                        'practice_day_off' => $row['ngaynghi_th'],
                                        'self_learning_time' => $row['gio_tuhoc']
                                    ];
                                    // dd($dataArray);
                                } else {
                                    return back()->with('message','Dữ liệu chưa chính xác. Vui lòng kiểm tra lại tên trường dữ liệu hoặc dữ liệu giảng viên !');
                                }
                            }
                        }
                    } 
                    if(!empty($dataArray)) {
                        DataTeach::insert($dataArray);
                        return back()->with('success','Thêm thành công '.count($dataArray).' dữ liệu!');
                    }
                }
            // }
        }

    }

}
