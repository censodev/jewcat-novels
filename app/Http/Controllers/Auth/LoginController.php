<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function postNormalSignin(Request $request) {
        $arr = ['email' => $request->txtEmail, 'password' => $request->txtPassword];
        $remember = $request->checkRemember == null ? false : true;
        
        if(Auth::attempt($arr, $remember)) {
            return back();
        }
        else{
            return back()->withInput()->with('errorSignin', 'Email hoặc mật khẩu chưa chính xác');
        }
    }

    public function getSignout(Request $request) {
        Auth::logout();
        if($request->path() == 'profile') return redirect()->intended('/');
        else return back();
    }

    public function postAdminSignin(Request $request) {
        $arr = ['email' => $request->txtEmail, 'password' => $request->txtPassword];
        if(Auth::attempt($arr)) {
            if(Auth::user()->role != 1) return redirect()->intended('/admin');
            else {
                Auth::logout();
                return back()->withInput()->with('errorSignin', 'Tài khoản không có quyền truy cập');
            }
        }
        else{
            return back()->withInput()->with('errorSignin', 'Email hoặc mật khẩu chưa chính xác');
        }
    }
}
