<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\WithPagination;


#[Title('Produk')]
class Produkview extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('livewire.produkview',[
            'products' => $products
        ]);
    }
}
