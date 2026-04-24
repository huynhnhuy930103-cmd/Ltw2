<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductNew extends Component
{
    public $products;

    public function __construct()
    {

        $this->products = Product::where('status', 1)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.product-new');
    }
}
