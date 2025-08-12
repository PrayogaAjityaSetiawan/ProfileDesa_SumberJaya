<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnggaranDesa;
use Livewire\Attributes\Title;


#[Title('Keuangan Desa')]

class KeuanganDesa extends Component
{
    public $anggaran;
    public function render()
    {
        $this->anggaran = AnggaranDesa::latest()->first() ?? null;
        $total = $this->anggaran->anggaran + $this->anggaran->realisasi;

        return view('livewire.keuangan-desa', [
            'anggaran' => $this->anggaran
            , 'total' => $total
        ]);
    }
}
