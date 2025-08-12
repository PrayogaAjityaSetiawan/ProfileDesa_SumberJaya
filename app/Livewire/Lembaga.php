<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Lembaga')]
class Lembaga extends Component
{
    public function render()
    {
        return view('livewire.lembaga');
    }
}
