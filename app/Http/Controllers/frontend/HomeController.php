<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $list_phone = Product::where('category_id', 8)
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(8) // Đảm bảo con số này là 8
            ->get();

        $list_laptop = Product::where('status', 1)
            ->where('category_id', 4)
            ->latest()
            ->limit(8)
            ->get();

        return view('frontend.home', compact('list_phone', 'list_laptop'));
    }
}
