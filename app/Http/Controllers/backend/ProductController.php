<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    $query->with(['category:id,name', 'brand:id,name']);
    $query->select('id', 'name', 'image', 'price_buy', 'category_id', 'brand_id', 'created_at');

    // Tìm kiếm theo tên sản phẩm
    if ($request->has('keyword') && !empty($request->input('keyword'))) {
        $query->where('name', 'like', '%' . $request->input('keyword') . '%');
    }

    // Lọc theo danh mục
    if ($request->has('category_id') && !empty($request->input('category_id'))) {
        $query->where('category_id', $request->input('category_id'));
    }

    // Lọc theo thương hiệu
    if ($request->has('brand_id') && !empty($request->input('brand_id'))) {
        $query->where('brand_id', $request->input('brand_id'));
    }

    // Sắp xếp
    if ($request->has('sort_by') && !empty($request->input('sort_by'))) {
        $sortBy = $request->input('sort_by');

        if ($sortBy == 'price_asc') {
            $query->orderBy('price_buy', 'asc');
        } elseif ($sortBy == 'price_desc') {
            $query->orderBy('price_buy', 'desc');
        } elseif ($sortBy == 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortBy == 'name_desc') {
            $query->orderBy('name', 'desc');
        }
    } else {
        $query->orderBy('created_at', 'desc');
    }

    // Phân trang
    $products = $query->paginate(10);

    return view('backend\dashboard.product', compact('products'));
}



}
