<?php

namespace Modules\User\Http\Controllers\ManageFunctions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\FunctionRepository;
use Modules\User\Entities\Role;


class ManageFunctionsController extends Controller
{
    /**
    * get all functions
    * @return view
    */
    public function getFunction()
    {
        //$funcs = FunctionRepository::get_all_functions();
        $functions = FunctionRepository::get_all_functions();
        return view('user::manage_functions.manageFunctions',compact('functions'));
    }


    /**
    * create and edit
    * @param $request
    * @return void
    */
    public function saveFunctions(Request $request)
    {
        $functions = FunctionRepository::save_functions($request);
        if($functions == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

    /**
    * remove with check all functions
    * @author AnTV
    * @param $request
    * @return view
    */
    public function removeFunctions(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn quyền nào.!!!'
        ]);
        $functions = FunctionRepository::remove_functions($request);
        if($functions == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }
}