<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    // ================== DANH SÁCH ==================
    public function index(Request $request)
    {
        $query = Topic::latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $topic = $query->paginate(10)->withQueryString();

        return view('backend.topic.index', compact('topic'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        return view('backend.topic.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);

        $slug = Str::slug($request->name);

        // chống trùng slug
        $count = Topic::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Topic::create([
            'name' => $request->name,
            'slug' => $slug,
            'sort_order' => $request->sort_order ?? 1,
            'description' => $request->description,
            'created_by' => 1, // hoặc auth()->id()
            'updated_by' => null,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('topic.index')->with('success', 'Thêm topic thành công');
    }

    // ================== SHOW ==================
    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);

        return view('backend.topic.show', compact('topic'));
    }

    // ================== EDIT ==================
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);

        return view('backend.topic.edit', compact('topic'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, string $id)
    {
        $topic = Topic::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'sort_order' => 'nullable|integer',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);

        $slug = Str::slug($request->name);

        // chống trùng slug (trừ chính nó)
        $count = Topic::where('slug', 'like', $slug . '%')
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $topic->update([
            'name' => $request->name,
            'slug' => $slug,
            'sort_order' => $request->sort_order ?? 1,
            'description' => $request->description,
            'updated_by' => 1, // hoặc auth()->id()
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('topic.index')->with('success', 'Cập nhật thành công');
    }

    // ================== XÓA MỀM ==================
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topic.index')->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== THÙNG RÁC ==================
    public function trash(Request $request)
    {
        $query = Topic::onlyTrashed()->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $topics = $query->paginate(10)->withQueryString();

        return view('backend.topic.trash', compact('topics'));
    }

    // ================== KHÔI PHỤC ==================
    public function restore($id)
    {
        Topic::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.topic.trash')
            ->with('success', 'Khôi phục thành công');
    }

    // ================== XÓA VĨNH VIỄN ==================
    public function delete($id)
    {
        Topic::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.topic.trash')
            ->with('success', 'Xóa vĩnh viễn thành công');
    }
    // ================== ĐỔI TRẠNG THÁI ==================
    public function status($id)
    {
        $topic = Topic::findOrFail($id);

        $topic->status = !$topic->status;
        $topic->save();

        return redirect()->route('topic.index');
    }
}
