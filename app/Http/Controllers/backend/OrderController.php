<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // ================== LIST ==================
    public function index(Request $request)
    {
        $query = Order::latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%');
        }

        $orders = $query->paginate(10)->withQueryString();

        return view('backend.order.index', compact('orders'));
    }

    // ================== CREATE FORM ==================
    public function create()
    {
        return view('backend.order.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'email'   => 'required|email',
            'address' => 'required|string|max:255',
            'note'    => 'nullable|string',
        ]);

        Order::create([
            'user_id'    => $request->user_id,
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'    => $request->address,
            'note'       => $request->note,
            'status'     => $request->status ?? 2, // 2 = pending
            'updated_by' => null,
        ]);

        return redirect()->route('order.index')
            ->with('success', 'Tạo đơn hàng thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.order.show', compact('order'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.order.edit', compact('order'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'user_id' => 'required|integer',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'email'   => 'required|email',
            'address' => 'required|string|max:255',
            'note'    => 'nullable|string',
        ]);

        $order->update([
            'user_id'    => $request->user_id,
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'    => $request->address,
            'note'       => $request->note,
            'updated_by' => Auth::id() ?? 1,
        ]);

        return redirect()->route('order.index')
            ->with('success', 'Cập nhật đơn hàng thành công');
    }

    // ================== DELETE (SOFT DELETE) ==================
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        return back()->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== TRASH ==================
    public function trash(Request $request)
    {
        $query = Order::onlyTrashed()->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $orders = $query->paginate(10);

        return view('backend.order.trash', compact('orders'));
    }

    // ================== RESTORE ==================
    public function restore($id)
    {
        Order::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Khôi phục đơn hàng thành công');
    }

    // ================== FORCE DELETE ==================
    public function delete($id)
    {
        Order::withTrashed()->findOrFail($id)->forceDelete();

        return back()->with('success', 'Xóa vĩnh viễn thành công');
    }

    // ================== STATUS TOGGLE ==================
    public function status($id)
    {
        $order = Order::findOrFail($id);

        // 2 = pending, 1 = done, 0 = cancel (tuỳ bạn mở rộng)
        $order->status = $order->status == 1 ? 2 : 1;

        $order->save();

        return back();
    }
}
