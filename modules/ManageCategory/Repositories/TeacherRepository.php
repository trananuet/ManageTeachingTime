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
       	$teacher =Teacher::selectRaw("teachers.*,facultys.name as facultyName,titles.name as titleName")
                    ->leftjoin('facultys','facultys.id','=','teachers.facultyID')
                    ->leftjoin('titles','titles.id','=','teachers.titleID')
                    ->get();
        return $teacher;
    }

    public static function saveTeacher(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->id)){
                $teacher = Teacher::where('id', $request->id)->firstOrFail();
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
				$teacher = Teacher::where('id', $id);
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