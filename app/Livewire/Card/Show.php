<?php

namespace App\Livewire\Card;

use Livewire\Component;

class Show extends Component
{
    public $card;

    public function mount($slug)
    {
        $this->card = \App\Models\Card::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.card.show');
    }
}
