<?php

namespace App\Http\Controllers\frontend;
use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // danh sách bài viết
    public function index()
    {
        $posts = Post::where('status', 1)
            ->where('post_type', 'post')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('frontend.post', compact('posts'));
    }

    // chi tiết bài viết
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // bài viết liên quan
        $related = Post::where('status', 1)
            ->where('post_type', 'post')
            ->where('id', '!=', $post->id)
            ->limit(4)
            ->get();

        return view('frontend.post-detail', compact('post', 'related'));
    }
}
