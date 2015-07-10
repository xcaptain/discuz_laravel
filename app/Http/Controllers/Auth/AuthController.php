<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * 登录页
     */
    public function getLogin(Request $request)
    {
        return view('auth/login');
    }

    /**
     * 处理登录表单，记录登录用户
     */
    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $passwordmd5 = preg_match('/^\w{32}$/', $password) ? $password : md5($password);
        $user = User::where('username', $username)->first();
        $passwordNew = md5($passwordmd5.$user->salt);
        if ($_SERVER['HTTP_REFERER']) {
            $urlForward = $_SERVER['HTTP_REFERER'];
        } else {
            $urlForward = '/home';
        }
        if($passwordNew == $user->password) {
            Auth::loginUsingId($user->uid);
            return redirect($urlForward);
        } else {
            return redirect('/auth/login/');
        }
    }

    /**
     * 登出用户
     */
    public function getLogout(Request $request)
    {
        if(Auth::logout()) {
            redirect('/home');
        } else {
            dd('logout failed');
        }
    }
}
