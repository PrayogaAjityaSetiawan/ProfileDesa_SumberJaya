<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardWisata extends Component
{
    /**
     * Create a new component instance.
     */
    public $paketWisata,$index;  

    public function __construct($paketWisata, $index)
    {
        $this->paketWisata = $paketWisata;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.card-wisata');
    }
}
