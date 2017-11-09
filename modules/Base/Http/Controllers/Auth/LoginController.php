<?php

namespace Modules\Base\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Log;
use File;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
    * login
    * @author AnTV
    * @return view
    */
    public function index(){
        $contents = File::get(storage_path('status\tes.txt'));
        return view('base::auth.login',compact('contents'));
    }

    /**
     * Login system.
     *
     * @author AnTV
     * @param  
     * @return void
     */
    public function login(){
        // dd($request->email);
        //Log::info("BEGIN LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
        if(!Auth::attempt(request(['email','password']))){
            //Log::info("END LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
            return back()->with(['errors' => 'Login failed. Try again your email or password']);
        }
        //Log::info("END LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
        return redirect(route('home'))->with('noti','Login success!!!');
    }

    /**
     * Logout system.
     * @author AnTV 
     * @param  
     * @return void
     */
    public function logout()
    {
        // forget session and logout system
        //Log::info("BEGIN LOGOUT " . get_class() . " => " . __FUNCTION__ ."()");
        Session::flush();
        Auth::logout();
        // Log::info("END LOGOUT " . get_class() . " => " . __FUNCTION__ ."()");
        return redirect(route('home'));
    }

}
