<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductSale extends Component
{
    public $products;

    public function __construct()
    {
        // 🔥 lấy sản phẩm có giảm giá
        $this->products = Product::where('status', 1)
            ->whereNotNull('price_sale')
            ->where('price_sale', '>', 0)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.product-sale');
    }
}

