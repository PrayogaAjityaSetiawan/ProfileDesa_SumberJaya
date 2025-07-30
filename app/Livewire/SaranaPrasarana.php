<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Sarana Prasarana')]
class SaranaPrasarana extends Component
{
    public function render()
    {
        return view('livewire.sarana-prasarana');
    }
}
