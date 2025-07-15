<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PerangkatDesa;
use App\Models\VisiMisi;
use Livewire\Attributes\Title;



#[Title('Struktur Desa')]
class StrukurDesa extends Component
{
    public function render()
    {
        $perangkatDesas = PerangkatDesa::all();
        $visiMisi  = VisiMisi::first();
        return view('livewire.strukur-desa',[
            'perangkatDesas' => $perangkatDesas,
            'visiMisi' => $visiMisi
        ]);
    }
}
