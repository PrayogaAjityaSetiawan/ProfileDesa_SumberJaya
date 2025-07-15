<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    /**
     * Create a new component instance.
     */
    public $about;
    public function __construct($about)
    {
        $this->about = $about;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.about');
    }
}
