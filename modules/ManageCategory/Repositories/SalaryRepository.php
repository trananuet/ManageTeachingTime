<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Salary;
use Modules\ManageCategory\Entities\Title;
use Illuminate\Http\Request;
use DB;

class SalaryRepository 
{

    public static function getAllSalary()
    {
       	$salary =Salary::selectRaw("salarys.*,titles.name as titleName, titles.quota as titleQuota")
                    ->leftjoin('titles','titles.id','=','salarys.titleID')
                    ->get();
        return $salary;
    }

    public static function saveSalary(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->id)){
                $salary = Salary::where('id', $request->id)->firstOrFail();
                $salary->name = $request->name;
                $salary->titleID = $request->title;
                $salary->save();
                DB::commit();
                return true;
            } else {   
                $salary = new Salary();
                $salary->name = $request->name;
                $salary->titleID = $request->title;
                $salary->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeSalary(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$salary = Salary::where('id', $id);
				if(!$salary){
					return false;
				}
				$salary->delete();
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