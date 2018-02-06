<?php

namespace Modules\Base\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Entities\Account;
use Modules\Base\Entities\User;
use Modules\User\Entities\UserRole;
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
     * @param  use ID_TEACHER = 2 ; use helpers/DefineHelper.php
     * @return void
     */
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $accounts = Account::where('account',$email)->get();
        $users = User::where('email', $email)->get();
        if(count($accounts) != 0) {
            if(count($users) != 0) {
                if(Auth::attempt(request(['email','password']))) {
                // if(!Auth::attempt(request(['email','password']))) {
                //     return back()->with(['errors' => 'Login failed. Try again your email or password']);
                // } else {
                    return redirect(route('home'))->with('noti','Login success!!!');
                }
            } 
            if(count($users) == 0) {
                foreach($accounts as $account){
                    $user = new User();
                    $user->name = $account->name;
                    $user->email = $account->account;
                    $user->password = $account->password;
                    $user->save();


                    $user_role = new UserRole();
                    $user_role->user_id = $user->id;
                    $user_role->role_id = ID_TEACHER;
                    $user_role->save();
                }
                if(Auth::attempt(request(['email','password']))) {
                    return redirect(route('home'))->with('noti','Login success!!!');
                }
            }
        } else {
            if(!Auth::attempt(request(['email','password']))){
                return back()->with(['errors' => 'Login failed. Try again your email or password']);
            } else {
                return redirect(route('home'))->with('noti','Login success!!!');
            }
        }
        
        // // dd($request->email);
        // //Log::info("BEGIN LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
        // if(!Auth::attempt(request(['email','password']))){
        //     //Log::info("END LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
        //     return back()->with(['errors' => 'Login failed. Try again your email or password']);
        // }
        // //Log::info("END LOGIN " . get_class() . " => " . __FUNCTION__ ."()");
        // return redirect(route('home'))->with('noti','Login success!!!');
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
