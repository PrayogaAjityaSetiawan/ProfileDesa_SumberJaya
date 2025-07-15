<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PaketWisata;
use Livewire\Attributes\Title;


#[Title('Paket Wisata')]

class WisataView extends Component
{
    public function render()
    {
        $paketWisatas = PaketWisata::limit(4)->get();
        return view('livewire.wisata-view',
        [
            'paketWisatas' => $paketWisatas
        ]
    );
    }
}
