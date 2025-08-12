<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Galeri;
use Livewire\WithPagination;
use Livewire\Attributes\Title;


#[Title('Galeri')]
class GaleriPage extends Component
{
    use WithPagination;

    public function render()
    {
        $galeris = Galeri::orderBy('created_at', 'DESC')
            ->paginate(9);
        return view('livewire.galeri', compact('galeris'));
    }
}
