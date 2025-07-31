<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Galeri extends Component
{
    /**
     * Create a new component instance.
     */
    public $galeris;
    public function __construct($galeris)
    {
        //
        $this->galeris = $galeris;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.galeri');
    }
}
