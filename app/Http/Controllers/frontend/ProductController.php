<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    private function get_category_parent($cat_id)
    {
        $categoryids = [];
        array_push($categoryids, $cat_id);

        $categorys1 = Category::select('id', 'parent_id')
            ->where([['status', '=', 1], ['parent_id', '=', $cat_id]])
            ->get();

        if (count($categorys1) > 0) {
            foreach ($categorys1 as $cat1) {
                array_push($categoryids, $cat1->id);

                $categorys2 = Category::select('id', 'parent_id')
                    ->where([['status', '=', 1], ['parent_id', '=', $cat1->id]])
                    ->get();

                if (count($categorys2) > 0) {
                    foreach ($categorys2 as $cat2) {
                        array_push($categoryids, $cat2->id);

                        $categorys3 = Category::select('id', 'parent_id')
                            ->where([['status', '=', 1], ['parent_id', '=', $cat2->id]])
                            ->get();

                        if (count($categorys3) > 0) {
                            foreach ($categorys3 as $cat3) {
                                array_push($categoryids, $cat3->id);
                            }
                        }
                    }
                }
            }
        }

        return $categoryids;
    }

    public function index(Request $request)
    {
        $query = Product::query();

        // category
        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // brand
        if ($request->brand) {
            $query->where('brand_id', $request->brand);
        }

        // search
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // price
        if ($request->price && $request->price != 'all') {
            [$min, $max] = explode('-', $request->price);
            $query->whereBetween('price_buy', [$min, $max]);
        }

        // sort
        if ($request->sort == 'price_asc') {
            $query->orderBy('price_buy', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price_buy', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $list_product = $query
            ->whereNotNull('slug')
            ->paginate(9)
            ->withQueryString();

        // sidebar
        $categories = Category::all();
        $brands = Brand::all();

        return view('frontend.product', compact('list_product', 'categories', 'brands'));
    }

    public function detail($slug)
    {
        $args = [
            ['slug', '=', $slug],
            ['status', '=', 1]
        ];

        $product = Product::where($args)->first();

        if ($product == null) {
            return abort(404, 'Trang này không tồn tại.');
        }

        $categoryids = $this->get_category_parent($product->category_id);

        $product_other = Product::select('id', 'name', 'slug', 'category_id', 'image', 'price_buy', 'price_sale')
            ->where([['id', '!=', $product->id], ['status', '=', 1]])
            ->whereIn('category_id', $categoryids)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'product_other'));
    }
}
