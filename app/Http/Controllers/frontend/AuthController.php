<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // FORM LOGIN
    public function login()
    {
        return view('frontend.login');
    }

    // FORM REGISTER
    public function register()
    {
        return view('frontend.auth.register');
    }

    // HANDLE REGISTER
    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'user',
            'status' => 1
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

    // HANDLE LOGIN
    public function doLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/'); // trang chủ
        }

        return back()->with('error', 'Sai tài khoản');
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
