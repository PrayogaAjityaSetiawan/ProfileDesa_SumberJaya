<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PerangkatDesa;

class PerangkatDesaView extends Component
{
    public function render()
    {
        $perangkatDesas = PerangkatDesa::all();
        return view('livewire.perangkat-desa-view',[
            'perangkatDesas' => $perangkatDesas
        ]);
    }
}
