<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Galeri;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightFeComponent extends Component
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
        $galeris = Galeri::latest()->take(2)->get();
        $articleTerbarus = Article::take(5)->latest()->get();
        return view('components.right-fe-component',compact("articleTerbarus","galeris"));
    }
}
