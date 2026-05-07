<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // 🔥 CATEGORY
  $categories = Category::withTrashed()->get();

            // sản phẩm mới (mới nhất theo ngày tạo)
    $product_new = Product::orderBy('created_at', 'desc')
                        ->take(8)
                        ->get();

    // sản phẩm khuyến mãi (có giá sale)
    $product_sale = Product::whereNotNull('price_sale')
    ->whereColumn('price_sale', '<', 'price_buy')
    ->orderBy('created_at', 'desc')
    ->take(8)
    ->get();


        return view('frontend.home', compact(
            'categories',
            'product_sale',
            'product_new'
        ));
    }

     // 🔥 TRANG GIỚI THIỆU
    public function about()
    {
        $about = Post::where('slug', 'gioi-thieu')
                    ->where('status', 1)
                    ->first();

        return view('frontend.about', compact('about'));
    }
}
