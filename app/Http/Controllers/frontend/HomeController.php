<?php

// namespace App\Http\Controllers\frontend;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     public function index()
// {
//     return view('frontend.home');
// }

// }



namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product; //

use function PHPUnit\Framework\returnArgument;

class HomeController extends Controller
{
    public function index()
    {

        $product_sale = Product::where('status', 1)
            ->where('price_sale', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $products_new = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('frontend.home', compact('product_sale', 'products_new'));
    }
}
