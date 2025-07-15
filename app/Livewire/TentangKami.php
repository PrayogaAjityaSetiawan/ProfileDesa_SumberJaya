<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\About;
use Livewire\Attributes\Title;

#[Title('Tentang Kami')]

class TentangKami extends Component
{
    public function render()
    {
        $tentangKami = About::first();
        return view('livewire.tentang-kami')
            ->with('tentangKami', $tentangKami);
    }
}
