<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('deleted_at')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::where('parent_id', 0)
            ->whereNull('deleted_at')
            ->get();

        return view('backend.category.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:category,slug',
        ]);

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
            'updated_by' => null,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $parents = Category::where('parent_id', 0)
            ->whereNull('deleted_at')
            ->get();

        return view('backend.category.edit', compact('category', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:category,slug,' . $id,
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

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

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('category.index');
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->get();

        return view('backend.category.trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.category.trash');
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->forceDelete();

        return redirect()->route('admin.category.trash');
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);

        $category->status = !$category->status;
        $category->save();

        return back();
    }
}
