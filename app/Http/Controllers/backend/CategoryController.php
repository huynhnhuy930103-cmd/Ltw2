<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // ================== LIST ==================
    public function index(Request $request)
    {
        $query = Category::with('parent')
            ->whereNull('deleted_at');

        // 🔍 SEARCH
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // 📄 PAGINATION
        $categories = $query
            ->orderBy('sort_order', 'asc')
            ->paginate(10);

        return view('backend.category.index', compact('categories'));
    }

    // ================== CREATE ==================
    public function create()
    {
        $parents = Category::where('parent_id', 0)
            ->whereNull('deleted_at')
            ->get();

        return view('backend.category.create', compact('parents'));
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required |unique:category,name',
            'slug' => 'required|unique:category,slug',
        ], [
         'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'detail.required' => 'Vui lòng nhập chi tiết danh mục.',
        ]

        );

        $imagePath = $request->file('image')
            ? $request->file('image')->store('categories', 'public')
            : null;

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'parent_id' => $request->parent_id ?? 0,
            'sort_order' => $request->sort_order ?? 1,
            'description' => $request->description,
            'created_by' => 1,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Thêm danh mục thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $category = Category::with('parent')->findOrFail($id);

        return view('backend.category.show', compact('category'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $parents = Category::where('parent_id', 0)
            ->whereNull('deleted_at')
            ->where('id', '!=', $id)
            ->get();

        return view('backend.category.edit', compact('category', 'parents'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:category,slug,' . $id,
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {

            // ❌ Xóa ảnh cũ
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            // 📸 Upload ảnh mới
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'parent_id' => $request->parent_id ?? 0,
            'sort_order' => $request->sort_order ?? 1,
            'description' => $request->description,
            'updated_by' => 1,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Cập nhật thành công');
    }

    // ================== SOFT DELETE ==================
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('category.index')
            ->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== TRASH ==================
    public function trash(Request $request)
    {
        $query = Category::onlyTrashed();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $categories = $query
            ->orderBy('deleted_at', 'desc')
            ->paginate(10);

        return view('backend.category.trash', compact('categories'));
    }

    // ================== RESTORE ==================
    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.category.trash')
            ->with('success', 'Khôi phục thành công');
    }

    // ================== FORCE DELETE ==================
    public function delete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->forceDelete();

        return redirect()->route('admin.category.trash')
            ->with('success', 'Xóa vĩnh viễn');
    }

    // ================== TOGGLE STATUS ==================
    public function status($id)
    {
        $category = Category::findOrFail($id);

        $category->status = !$category->status;
        $category->save();

        return back()->with('success', 'Đã đổi trạng thái');
    }
}
