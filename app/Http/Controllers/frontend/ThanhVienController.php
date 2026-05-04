<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ThanhVienController extends Controller
{
    function login()
    {
        return view('frontend.login');
    }

    function dologin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $args = [
            ['status', '=', 1],
        ];

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $username];
        } else {
            $args[] = ['username', '=', $username];
        }

        $user = User::where($args)->first();
        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                session()->put('user_site', $user);
                return redirect()->route('site.home')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('site.login')->with('error', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->route('site.login')->with('error', 'Tên đăng nhập hoặc email không tồn tại');
        }
    }


    function register()
    {
        return view('frontend.register');
    }

    function doregister(Request $request)
    {
        // validate
        $request->validate([
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ]);
$user = User::create([
    'name' => $request->username,
    'username' => $request->username,
    'email' => $request->email,

    // FIX CHÍNH Ở ĐÂY
    'phone' => $request->phone ?? '0000000000',

    'password' => Hash::make($request->password),
    'address' => null,
    'image' => null,
    'roles' => 'user',
    'status' => 1,
]);

        if ($user) {
            return redirect()->route('site.login')
                ->with('success', 'Đăng ký thành công, hãy đăng nhập');
        }

        return back()->with('error', 'Đăng ký thất bại');
    }

function logout(Request $request)
{
    $request->session()->forget('user_site');
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}


    public function profile()
{
    $user = session('user_site');

    if (!$user) {
        return redirect()->route('site.login')
            ->with('error', 'Bạn cần đăng nhập trước');
    }

    return view('frontend.profile', compact('user'));
}
}
