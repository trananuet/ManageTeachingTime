<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Teacher;
use Modules\ManageCategory\Entities\Faculty;
use Modules\ManageCategory\Entities\Title;
use Illuminate\Http\Request;
use DB;

class TeacherRepository 
{

    public static function getAllTeacher()
    {
       	$teacher =Teacher::selectRaw("teacher.*,faculty.name as facultyName,title.titleName as titleName")
                    ->leftjoin('faculty','faculty.facultyID','=','teacher.facultyID')
                    ->leftjoin('title','title.titleID','=','teacher.titleID')
                    ->get();
        return $teacher;
    }

    public static function saveTeacher(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->teacherID)){
                $teacher = Teacher::where('teacherID', $request->teacherID)->firstOrFail();
                $teacher->name = $request->name;
                $teacher->titleID = $request->title;
                $teacher->facultyID = $request->faculty;
                $teacher->reduce = $request->reduce;
                $teacher->save();
                DB::commit();
                return true;
            } else {   
                $teacher = new Teacher();
                $teacher->name = $request->name;
                $teacher->titleID = $request->title;
                $teacher->facultyID = $request->faculty;
                $teacher->reduce = $request->reduce;
                $teacher->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeTeacher(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$teacher = Teacher::where('teacherID', $id);
				if(!$teacher){
					return false;
				}
				$teacher->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex){
			DB::rollback();
			return false;
		}
	}

}