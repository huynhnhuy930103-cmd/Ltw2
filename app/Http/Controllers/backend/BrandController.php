<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    // ================== DANH SÁCH ==================
    public function index(Request $request)
    {
        $query = Brand::latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $brands = $query->paginate(10)->withQueryString();

        return view('backend.brand.index', compact('brands'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        return view('backend.brand.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $slug = Str::slug($request->name);

        // chống trùng slug
        $count = Brand::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('brand', 'public');
        }

        Brand::create([
            'name' => $request->name,
            'slug' => $slug,
            'sort_order' => $request->sort_order ?? 0,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status ?? 1,

            // FIX: dùng Auth chuẩn
            'created_by' => Auth::id() ?? 1,
            'updated_by' => null,
        ]);

        return redirect()->route('brand.index')->with('success', 'Thêm thương hiệu thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.show', compact('brand'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.edit', compact('brand'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp',
        ]);

        $slug = Str::slug($request->name);

        $count = Brand::where('slug', 'like', $slug . '%')
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $imageName = $brand->image;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('brand', 'public');
        }

        $brand->update([
            'name' => $request->name,
            'slug' => $slug,
            'sort_order' => $request->sort_order ?? 0,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status ?? 1,

            // FIX: update_by chuẩn
            'updated_by' => Auth::id() ?? 1,
        ]);

        return redirect()->route('brand.index')->with('success', 'Cập nhật thành công');
    }

    // ================== DELETE (SOFT DELETE) ==================
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== THÙNG RÁC ==================
    public function trash(Request $request)
    {
        $query = Brand::onlyTrashed()->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $brands = $query->paginate(10);

        return view('backend.brand.trash', compact('brands'));
    }

    // ================== KHÔI PHỤC ==================
    public function restore($id)
    {
        Brand::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('brand.trash')->with('success', 'Khôi phục thành công');
    }

    // ================== XÓA VĨNH VIỄN ==================
    public function delete($id)
    {
        Brand::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('brand.trash')->with('success', 'Xóa vĩnh viễn thành công');
    }

    // ================== STATUS (FIX CHUẨN DB 1-2) ==================
    public function status($id)
    {
        $brand = Brand::findOrFail($id);

        // DB bạn: 1 = active, 2 = hidden
        $brand->status = $brand->status == 1 ? 2 : 1;

        $brand->save();

        return redirect()->route('brand.index');
    }
}
