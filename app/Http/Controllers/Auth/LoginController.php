<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ 

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::profile;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $isAdmin = $request->input('role') === 'admin';

        if ($isAdmin) {

            if (auth::guard('admin')->attempt($credentials)) {

                return redirect()->route('admin.dashboard');
            } else {

                return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
            }
        } else {

            if (auth::guard('web')->attempt($credentials)) {

                return redirect()->route('user.dashboard');
            } else {
                return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
            }
        }
    }
}