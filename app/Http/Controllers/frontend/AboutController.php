<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class AboutController extends Controller
{
    public function index()
    {
        $about = Post::where('slug', 'gioi-thieu')
            ->where('post_type', 'page')
            ->where('status', 1)
            ->first();

        $summary = $about
            ? ($about->description ?: Str::limit(strip_tags($about->detail), 260))
            : null;

        return view('frontend.about-summary', compact('about', 'summary'));
    }

    public function detail()
    {
        $about = Post::where('slug', 'gioi-thieu')
            ->where('post_type', 'page')
            ->where('status', 1)
            ->first();

        return view('frontend.about', compact('about'));
    }
}
