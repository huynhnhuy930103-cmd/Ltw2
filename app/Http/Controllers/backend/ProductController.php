<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    // ================== DANH SÁCH ==================
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand'])->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->paginate(10)->withQueryString();

        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.index', compact('products', 'categories', 'brands'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.create', compact('categories', 'brands'));
    }

    // ================== LƯU ==================
    public function store(StoreProductRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:product,name',
        //     'category_id' => 'required',
        //     'brand_id' => 'required',
        //     'price_buy' => 'required|numeric',
        //     'qty' => 'required|integer',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // ]);

        // tạo slug
        $slug = Str::slug($request->name);

        // chống trùng slug
        $count = Product::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // upload ảnh
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('product', 'public');
        } else {
            $imageName = 'no-image.png'; // ảnh mặc định
        }

        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price_buy' => $request->price_buy,
            'price_sale' => $request->price_sale,
            'qty' => $request->qty,
            'image' => $imageName,
            'detail' => $request->detail,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('product.index')->with('success', 'Thêm thành công');
    }

    // ================== CHI TIẾT ==================
    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);

        return view('backend.product.show', compact('product'));
    }

    // ================== FORM EDIT ==================
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price_buy' => 'required|numeric',
            'qty' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // tạo slug
        $slug = Str::slug($request->name);

        // chống trùng slug
        $count = Product::where('slug', 'like', $slug . '%')
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // upload ảnh mới nếu có
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('product', 'public');
        } else {
            $imageName = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price_buy' => $request->price_buy,
            'price_sale' => $request->price_sale,
            'qty' => $request->qty,
            'image' => $imageName,
            'detail' => $request->detail,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
    }

    // ================== XÓA MỀM ==================
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.index')->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== THÙNG RÁC ==================
    public function trash(Request $request)
    {
        $query = Product::onlyTrashed()->latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $products = $query->paginate(10);

        return view('backend.product.trash', compact('products'));
    }

    // ================== KHÔI PHỤC ==================
    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.product.trash')->with('success', 'Đã khôi phục');
    }

    // ================== XÓA VĨNH VIỄN ==================
    public function forceDelete($id)
    {
        Product::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.product.trash')->with('success', 'Đã xóa vĩnh viễn');
    }

    // ================== ĐỔI TRẠNG THÁI ==================
    public function status($id)
    {
        $product = Product::findOrFail($id);

        $product->status = !$product->status;
        $product->save();

        return redirect()->route('product.index');
    }
}
