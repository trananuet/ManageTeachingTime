<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Title;
use Illuminate\Http\Request;
use DB;

class TitleRepository 
{
    /**
    * title
    * @author Cong
    * @param 
    * @return static
    */
    public static function getAllTitle()
    {
       	$title = Title::all(); 
        return $title;
    }

    public static function saveTitle(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->titleID)){
                $title = Title::where('titleID', $request->titleID)->firstOrFail();
                $title->titleName = $request->Name;
                $title->DinhMuc = $request->Dinhmuc;
                $active = $request->active;
                if($active == 1){
                    $title->active = '1';
                } else {
                    $title->active = '0';
                }
                $title->save();
                DB::commit();
                return true;
            } else {   
                $title = new Title();
                $title->titleName = $request->Name;
                $title->DinhMuc = $request->Dinhmuc;
                $active = $request->active;
                if($active == 1){
                    $title->active = '1';
                } else {
                    $title->active = '0';
                }
                $title->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeTitle(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$title = Title::where('titleID', $id);
				if(!$title){
					return false;
				}
				$title->delete();
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