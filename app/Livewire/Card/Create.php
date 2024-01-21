<?php

namespace App\Livewire\Card;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // rule is required, max 1MB and must be an image
    
    public $fullname;

    public $image;

    public $age;

    public $message;

    public $slug;

    public function store()
    {
        $this->validate([
            'fullname' => 'required',
            'image' => 'required|image|max:1024',
            'age' => 'required',
            'message' => 'required',
        ]);

        $image = $this->image->store('images', 'public');
        $slug = Str::slug($this->fullname);
        
        \App\Models\Card::create([
            'fullname' => $this->fullname,
            'image' => $image,
            'age' => $this->age,
            'message' => $this->message,
            'slug' => $slug
        ]);

        session()->flash('message', 'Card successfully created.');

        return redirect()->route('card.index');
    }

    public function render()
    {
        return view('livewire.card.create');
    }
}
