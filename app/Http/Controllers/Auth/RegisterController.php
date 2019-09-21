<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function postRegister(Request $request) {
        $isExist = DB::table('users')->where('email', $request->txtEmail)->first() == null ? false : true;
        $err = '';
        if($isExist) {
            $err = 'Email đã được sử dụng';  
        }   
        else {
            if ($request->txtPassword != $request->txtConfPassword) {
                $err = 'Mật khẩu xác nhận không chính xác';
            } 
        }

        if($err) {
            return back()->withInput()->with('errorRegister', $err);
        }
        else {
            DB::table('users')->insert([
                'name' => $request->txtUsn,
                'email' => $request->txtEmail,
                'password' => Hash::make($request->txtPassword),
                'image_url' => 'default.png',
                // 'address' => $request->txtAddress,
                // 'phone_number' => $request->txtPhone,
                'account_type' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPassword]);
            if($request->path() == 'profile') return redirect()->intended('/');
            else return back();
        }
    }
}
