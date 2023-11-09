<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryDropdown extends Component
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
        //        $cat = Category::firstWhere('slug', request('category'));
//        $catid = $cat ? $cat->id : 0;
        //            'categories' => Category::all(),
//            'currentCategoryId' => $catid,

        //Component specific category data to view
        $categories = \App\Models\Category::all();
        $currentCategoryId = \App\Models\Category::firstWhere('slug', request('category'));
        $currentCategoryId = $currentCategoryId ? $currentCategoryId->id : 0;

        return view('components.category-dropdown', [
            'categories' => $categories,
            'currentCategoryId' => $currentCategoryId,
        ]);
    }
}
