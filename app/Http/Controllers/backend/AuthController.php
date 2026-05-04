<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DologinAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ================= LOGIN FORM =================
    function login()
    {
        if (Auth::check() && Auth::user()->roles === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view("backend.user.login");
    }

    // ================= HANDLE LOGIN =================
    function dologin(Request $request)
    {
        // login rồi
        if (Auth::check() && Auth::user()->roles === 'admin') {
            return redirect()->route('admin.dashboard');
        }


        $loginInput = $request->username;

        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $credentials = [
            $fieldType => $loginInput,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            $user = Auth::user();


            if ($user->roles !== 'admin') {
                Auth::logout();
                return back()->with('error', 'Bạn không có quyền admin');
            }

            if ($user->status != 2) {
                Auth::logout();
                return back()->with('error', 'Tài khoản bị khóa');
            }

            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard')
                ->with('lg-success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Email/Username hoặc mật khẩu không đúng');
    }

    // ================= LOGOUT =================
    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('lo-success', 'Đăng xuất thành công!');
    }
}
