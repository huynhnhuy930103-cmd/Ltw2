<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    // 📄 INDEX
    public function index()
    {
        $orderDetails = OrderDetail::orderBy('id', 'desc')->get();
        return view('backend.orderdetail.index', compact('orderDetails'));
    }

    // ➕ CREATE
    public function create()
    {
        return view('backend.orderdetail.create');
    }

    // 💾 STORE
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        OrderDetail::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'amount' => $request->price * $request->qty,
        ]);

        return redirect()->route('orderdetail.index');
    }

    // ✏ EDIT
    public function edit($id)
    {
        $item = OrderDetail::findOrFail($id);
        return view('backend.orderdetail.edit', compact('item'));
    }

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $item = OrderDetail::findOrFail($id);

        $item->update([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'amount' => $request->price * $request->qty,
        ]);

        return redirect()->route('orderdetail.index');
    }

    // ❌ DELETE
    public function destroy($id)
    {
        OrderDetail::findOrFail($id)->delete();
        return back();
    }
}
