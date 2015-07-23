<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Models\User\Detail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $now = Carbon::now()->timestamp;
        $uc = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5(md5($data['password']).$data['salt']),
            'salt' => $data['salt'],
            'regdate' => $now,
            'regip' => $_SERVER['REMOTE_ADDR'],
        ]);
        Detail::create([
            'uid' => $uc->uid,
            'username' => $uc->username,
            'email' => $uc->email,
            'password' => md5($uc->username),
            'groupid' => 10,
            'regdate' => $uc->regdate,
        ]);
    }

    /**
     * 登录页
     */
    public function getLogin(Request $request)
    {
        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            $urlForward = $_SERVER['HTTP_REFERER'];
        } else {
            $urlForward = '/';
        }
        $request->session()->put('urlForward', $urlForward);
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
        $urlForward = $request->session()->get('urlForward');
        if ($passwordNew == $user->password) {
            Auth::loginUsingId($user->uid);
            return redirect($urlForward);
        } else {
            return redirect('/auth/login/');
        }
    }

    /**
     * 登录页
     */
    public function getRegister()
    {
        return view('auth/register');
    }

    /**
     * 提交注册表单
     */
    public function postRegister(Request $request)
    {
        $data = $request->only(
            ['username', 'email', 'password', 'password2']
        );
        // 表单验证
        // 写入操作
        $data['salt'] = rand(100000, 999999);
        // TODO: 这里要使用transcation而不能顺序insert
        $this->create($data);
    }

    /**
     * 登出用户
     */
    public function getLogout(Request $request)
    {
        Auth::logout();
        return redirect('/welcome');
    }
}
