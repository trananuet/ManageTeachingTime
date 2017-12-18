<?php

namespace Modules\Statistic\Http\Controllers\ThesisLecturer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\ThesisLecturer;
use Modules\Statistic\Repositories\ThesisLecturerRepository;
use Modules\ManageCategory\Repositories\ThesisRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\ManageCategory\Repositories\TrainingRepository;


class ThesisLecturerController extends Controller
{
    public function getThesisLecturer()
    {
        $thesis_lecturers = ThesisLecturerRepository::getAllThesisLecturer();
        $thesis = ThesisRepository::getAllThesis();
        $teachers = TeacherRepository::getAllTeacher();
        $trainings = TrainingRepository::getAllTraining();
        return view('statistic::ThesisLecturer.thesisLecturer',compact('teachers','thesis_lecturers','thesis','trainings'));
    }

    

    public function createEditThesisLecturer(Request $request)
    {
        $thesis_lecturer = ThesisLecturerRepository::saveThesisLecturer($request);
        if($thesis_lecturer == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delThesisLecturer(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn giảng viên khóa luận nào.!!!'
        ]);
        $thesis_lecturer = ThesisLecturerRepository::removeThesisLecturer($request);
        if($thesis_lecturer == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
