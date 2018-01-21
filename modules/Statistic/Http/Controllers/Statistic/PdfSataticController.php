<?php

namespace Modules\Statistic\Http\Controllers\Statistic;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\CourseLecturer;
use PDF;

class PdfSataticController extends Controller
{
    /**
    * xuat ra file pdf
    * @author AnTV
    * @return download
    */
    public function exportPDF(){
        $course_lecturers = CourseLecturer::leftjoin('courses','course_lecturers.courseName','=','courses.name')
                            ->get();
        $pdf = PDF::loadView('pdf.course_lecturer',['course_lecturers' => $course_lecturers]);
        return $pdf->stream('course_lecturer.pdf');
    }
}
