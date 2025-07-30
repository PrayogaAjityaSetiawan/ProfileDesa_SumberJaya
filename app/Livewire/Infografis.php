<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Infografis as InfografisModel;



#[Title('Infografis')]
class Infografis extends Component
{
    public $infgrafis;
    public function render()
    {
        $this->infgrafis = InfografisModel::latest()->first() ?? null;

        

        
        return view('livewire.infografis' ,[
            'infografis' => $this->infgrafis
        ]);
    }
}
