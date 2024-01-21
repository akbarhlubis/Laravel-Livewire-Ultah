<?php

namespace App\Livewire\Card;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.card.index', [
            'cards' => \App\Models\Card::paginate(10),
        ]);
    }
}
