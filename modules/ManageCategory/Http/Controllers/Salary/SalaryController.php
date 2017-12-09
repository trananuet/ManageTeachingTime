<?php

namespace Modules\ManageCategory\Http\Controllers\Salary;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Salary;
use Modules\ManageCategory\Repositories\SalaryRepository;
use Modules\ManageCategory\Repositories\TitleRepository;


class SalaryController extends Controller
{
    public function getSalary()
    {
        $titles = TitleRepository::getAllTitle();
        $salarys = SalaryRepository::getAllSalary();
        return view('managecategory::Salary.salary',compact('titles','salarys'));
    }

    

    public function createEditSalary(Request $request)
    {
        $salary = SalaryRepository::saveSalary($request);
        if($salary == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delSalary(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $salary = SalaryRepository::removeSalary($request);
        if($salary == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
