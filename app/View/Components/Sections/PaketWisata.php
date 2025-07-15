<?php

namespace App\View\Components\sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaketWisata extends Component
{
    /**
     * Create a new component instance.
     */
    public $paketWisatas;
    public function __construct($paketWisatas)
    {
        $this->paketWisatas = $paketWisatas;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.paket-wisata');
    }
}
