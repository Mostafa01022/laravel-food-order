<?php

namespace App\Http\Controllers\Management\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ /* |-------------------------------------------------------------------------- | Login Controller |-------------------------------------------------------------------------- | | This controller handles authenticating users for the application and | redirecting them to your home screen. The controller uses a trait | to conveniently provide its functionality to your applications. | */
    use AuthenticatesUsers;
    /** * Where to redirect users after login. * * @var string */ protected $redirectTo = RouteServiceProvider::profile;
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        return $credentials;
    }
    /** * Create a new controller instance. * * @return void */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $role = $request->input('role');
        if ($role === 'admin') {
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended('/management');
            }
        }
        return redirect()->back()->withErrors([$this->username() => trans('auth.failed'),]);
    }
}

