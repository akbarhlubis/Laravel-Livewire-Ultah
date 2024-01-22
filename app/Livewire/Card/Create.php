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

    #[Rule('max:2048', message: 'Ukuran File Maksimal 2MB')]
    public $image;

    public $age;

    public $message;

    public $slug;

    public function store()
    {
        $this->validate([
            'fullname' => 'required',
            'age' => 'required',
            'message' => 'required',
        ]);

        // if image is not empty, then upload to storage/app/public
        if ($this->image != '') {
            $image = $this->image->store('images', 'public');
        } else {
            $image = '';
        }
        $slug = 'hbd-' . Str::slug($this->fullname);

        \App\Models\Card::create([
            'fullname' => $this->fullname,
            'image' => $image,
            'age' => $this->age,
            'message' => $this->message,
            'slug' => $slug
        ]);

        session()->flash('message', 'Kartu Ucapan Berhasil di Buat!, Silahkan Share Link Berikut: ' . url('/card/' . $slug));
        session()->flash('message', 'Kartu Ucapan Berhasil di Buat!, Silahkan Share Link Berikut: . <a href="'.url('/' . $slug).'">Klik Disini</a>');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.card.create');
    }
}
