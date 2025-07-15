<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Title;


#[Title('Produk')]
class Produkview extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.produkview',[
            'products' => $products
        ]);
    }
}
