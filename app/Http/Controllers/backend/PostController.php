<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // ================== INDEX ==================
    public function index(Request $request)
    {
        $query = Post::latest();

        if ($request->keyword) {
            $query->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('slug', 'like', '%' . $request->keyword . '%');
        }

        $posts = $query->paginate(10)->withQueryString();

        return view('backend.post.index', compact('posts'));
    }

    // ================== CREATE ==================
    public function create()
    {
        return view('backend.post.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:1000',
            'slug'        => 'required|string|max:1000',
            'detail'      => 'required',
            'topic_id'    => 'nullable|integer',
            'post_type'   => 'required|in:post,page',
            'description' => 'nullable|string',
        ]);

        Post::create([
            'topic_id'    => $request->topic_id,
            'title'       => $request->title,
            'slug'        => $request->slug,
            'detail'      => $request->detail,
            'image'       => null,
            'post_type'   => $request->post_type,
            'description' => $request->description,
            'created_by'  => Auth::id() ?? 1,
            'updated_by'  => null,
            'status'      => 2,
        ]);

        return redirect()->route('post.index')
            ->with('success', 'Tạo bài viết thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('backend.post.show', compact('post'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('backend.post.edit', compact('post'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:1000',
            'slug'        => 'required|string|max:1000',
            'detail'      => 'required',
            'topic_id'    => 'nullable|integer',
            'post_type'   => 'required|in:post,page',
            'description' => 'nullable|string',
        ]);

        $post->update([
            'topic_id'    => $request->topic_id,
            'title'       => $request->title,
            'slug'        => $request->slug,
            'detail'      => $request->detail,
            'post_type'   => $request->post_type,
            'description' => $request->description,
            'updated_by'  => Auth::id() ?? 1,
        ]);

        return redirect()->route('post.index')
            ->with('success', 'Cập nhật thành công');
    }

    // ================== DELETE (SOFT) ==================
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return back()->with('success', 'Đã đưa vào thùng rác');
    }

    // ================== TRASH ==================
    public function trash()
    {
        $posts = Post::onlyTrashed()->latest()->paginate(10);

        return view('backend.post.trash', compact('posts'));
    }

    // ================== RESTORE ==================
    public function restore($id)
    {
        Post::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Khôi phục thành công');
    }

    // ================== FORCE DELETE ==================
    public function delete($id)
    {
        Post::withTrashed()->findOrFail($id)->forceDelete();

        return back()->with('success', 'Xóa vĩnh viễn thành công');
    }

    // ================== STATUS ==================
    public function status($id)
    {
        $post = Post::findOrFail($id);

        $post->status = $post->status == 1 ? 2 : 1;
        $post->save();

        return back();
    }
}
