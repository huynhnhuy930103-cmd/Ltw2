<?php

namespace App\Http\Controllers\backend;
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
         $productCount = Product::count();
        $userCount = User::count();

        $products = Product::where('status', '!=', 0)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // ✅ CHỈ GIỮ 1 RETURN
        return view('backend.dashboard.index', compact(
            'productCount',
            'userCount',
            'products'
        ));

        //return view('backend.dashboard.index');
    }
}
