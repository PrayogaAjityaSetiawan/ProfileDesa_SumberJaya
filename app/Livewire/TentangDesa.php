<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Tentang Desa')]
class TentangDesa extends Component
{
    public function render()
    {
        return view('livewire.tentang-desa');
    }
}
