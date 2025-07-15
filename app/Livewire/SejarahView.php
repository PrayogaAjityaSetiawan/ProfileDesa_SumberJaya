<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sejarah;
use Livewire\Attributes\Title;


#[Title('Sejarah')]

class SejarahView extends Component
{
    public function render()
    {
        $sejarah = Sejarah::first();
        return view('livewire.sejarah-view',[
            'sejarah' => $sejarah
        ]);
    }
}
