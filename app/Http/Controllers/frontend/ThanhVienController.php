<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ThanhVienController extends Controller
{
    // Hiển thị form login
    public function login()
{
    if (session()->has('user')) {
        return redirect()->route('site.home'); // ✅ về trang chủ
    }

    return view('frontend.login');
}
    // Xử lý login
    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $args = [
            'status' => 1
        ];

        // check email hay username
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args['email'] = $username;
        } else {
            $args['username'] = $username;
        }

        $user = User::where($args)->first();

        if ($user != null) {
            if (Hash::check($password, $user->password)) {

                // lưu session
                session(['user' => $user]);

                return redirect()->route('site.profile')
                    ->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('site.login')
                    ->with('error', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->route('site.login')
                ->with('error', 'Tài khoản không tồn tại');
        }
    }

    // logout
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('site.login');
    }

    // profile
    public function profile()
    {
        if (!session()->has('user')) {
            return redirect()->route('site.login');
        }

        return view('frontend.profile');
    }
}
