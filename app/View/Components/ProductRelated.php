<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class ProductRelated extends Component
{
    public $related_products;

    public function __construct($product)
    {
        $this->related_products = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('components.product-related');
    }
}
