<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;

class ProductCategory extends Component
{
    public $products;
    public $category;

    public function __construct($categoryId = null)
    {
        // nếu có categoryId
        if ($categoryId) {

            $this->category = Category::where('status', 1)
                ->find($categoryId);

            $this->products = Product::where('status', 1)
                ->where('category_id', $categoryId)
                ->latest()
                ->limit(8)
                ->get();
        } else {
            $this->category = null;

            $this->products = Product::where('status', 1)
                ->latest()
                ->limit(4)
                ->get();
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.product-category', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}

