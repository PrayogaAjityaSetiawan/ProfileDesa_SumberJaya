<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $slug;
    public $product;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.product-detail')->title($this->product->slug);
    }
}
