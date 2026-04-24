<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // 👉 Lấy giỏ hàng
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng trống!');
        }

        // 👉 Tính tổng
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // 👉 (Tạm thời) chưa lưu DB, chỉ xoá giỏ
        session()->forget('cart');

        return redirect('/gio-hang')->with('success', 'Đặt hàng thành công!');
    }
}
