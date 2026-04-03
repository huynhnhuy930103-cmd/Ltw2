<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
{
    // Cách viết mảng lồng nhau đúng chuẩn: [ [cột, toán tử, giá trị], [cột, toán tử, giá trị] ]
    $list_banner = Banner::where([
            ['position', '=', 'slideshow'],
            ['status', '=', 1]
        ])
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    return view('components.slider', compact('list_banner'));
}
}
