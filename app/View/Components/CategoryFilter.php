<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryFilter extends Component
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
        $list_category = Category::select('id', 'name')
        ->where([['parent_id', '=',0], ['status', '=', 1]])
        ->orderBy('sort_order', 'ASC')
        ->get();
        return view('components.category-filter', compact('list_category'));

    }
}
