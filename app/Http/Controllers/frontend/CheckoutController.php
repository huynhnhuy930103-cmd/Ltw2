<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.checkout', compact('cart'));
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Giỏ hàng trống!');
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    // 👉 LƯU DB
    Order::create([
        'user_id' => session('user_site.id'),
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'total' => $total,
    ]);

    session()->forget('cart');

    return redirect('/gio-hang')->with('success', 'Đặt hàng thành công!');
}
}
