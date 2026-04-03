<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    // ================== DANH SÁCH ==================
    public function index(Request $request)
    {
        $query = Menu::latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->position) {
            $query->where('position', $request->position);
        }

        $menus = $query->paginate(10)->withQueryString();

        return view('backend.menu.index', compact('menus'));
    }

    // ================== CREATE ==================
    public function create()
    {
        return view('backend.menu.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'position' => 'required',
            'type' => 'required',
        ]);

        Menu::create([
            'name' => $request->name,
            'link' => $request->link,
            'position' => $request->position ?? 'mainmenu',
            'table_id' => $request->table_id,
            'parent_id' => $request->parent_id ?? 0,
            'type' => $request->type ?? 'custom',
            'sort_order' => $request->sort_order ?? 1,
            'created_by' => 1,
            'updated_by' => null,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('menu.index')->with('success', 'Thêm menu thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $menu = Menu::findOrFail($id);

        return view('backend.menu.show', compact('menu'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('backend.menu.edit', compact('menu'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $menu->update([
            'name' => $request->name,
            'link' => $request->link,
            'position' => $request->position,
            'table_id' => $request->table_id,
            'parent_id' => $request->parent_id ?? 0,
            'type' => $request->type,
            'sort_order' => $request->sort_order ?? 1,
            'updated_by' => 1,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('menu.index')->with('success', 'Cập nhật thành công');
    }

    // ================== XÓA MỀM ==================
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== THÙNG RÁC ==================
    public function trash(Request $request)
    {
        $query = Menu::onlyTrashed()->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $menus = $query->paginate(10)->withQueryString();

        return view('backend.menu.trash', compact('menus'));
    }

    // ================== KHÔI PHỤC ==================
    public function restore($id)
    {
        Menu::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.menu.trash')->with('success', 'Khôi phục thành công');
    }

    // ================== XÓA VĨNH VIỄN ==================
    public function delete($id)
    {
        Menu::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.menu.trash')->with('success', 'Xóa vĩnh viễn thành công');
    }

    // ================== STATUS ==================
    public function status($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->status = !$menu->status;
        $menu->save();

        return redirect()->route('menu.index');
    }
}
