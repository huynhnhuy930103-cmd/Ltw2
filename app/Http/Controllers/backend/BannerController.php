<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // 📌 LIST
    public function index(Request $request)
    {
        $query = Banner::query();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->position) {
            $query->where('position', $request->position);
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $banners = $query->orderBy('sort_order', 'asc')->paginate(10);

        return view('backend.banner.index', compact('banners'));
    }

    // 📌 CREATE FORM
    public function create()
    {
        return view('backend.banner.create');
    }

    // 📌 STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        // upload image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        Banner::create($data);

        return redirect()->route('banner.index')
            ->with('success', 'Thêm banner thành công!');
    }

    // 📌 SHOW
    public function show(Banner $banner)
    {
        return view('backend.banner.show', compact('banner'));
    }

    // 📌 EDIT
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    // 📌 UPDATE
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        // update image
        if ($request->hasFile('image')) {

            // xóa ảnh cũ
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('banner.index')
            ->with('success', 'Cập nhật banner thành công!');
    }

    // 📌 SOFT DELETE (move to trash)
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banner.index')
            ->with('success', 'Đã đưa vào thùng rác!');
    }

    // 📌 TRASH LIST
    public function trash()
    {
        $banners = Banner::onlyTrashed()->paginate(10);

        return view('backend.banner.trash', compact('banners'));
    }

    // 📌 RESTORE
    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();

        return redirect()->route('admin.banner.trash')
            ->with('success', 'Khôi phục thành công!');
    }

    // 📌 DELETE FOREVER
    public function delete($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);

        // xóa file ảnh luôn
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->forceDelete();

        return redirect()->route('admin.banner.trash')
            ->with('success', 'Đã xóa vĩnh viễn!');
    }

    // 📌 STATUS TOGGLE
    public function status($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->status = !$banner->status;
        $banner->save();

        return redirect()->back()
            ->with('success', 'Đổi trạng thái thành công!');
    }
}
