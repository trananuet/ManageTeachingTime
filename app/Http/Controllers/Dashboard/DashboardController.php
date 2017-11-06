<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
    * Dashboard.
    * @author AnTV
    * @param  
    * @return view
    */
    public function index(){
        return view('dashboard.dashboard');
    }
}
