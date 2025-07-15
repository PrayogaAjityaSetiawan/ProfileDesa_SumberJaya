<?php

namespace App\View\Components\sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Article extends Component
{
    /**
     * Create a new component instance.
     */
    public $articles;
    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.article');
    }
}
