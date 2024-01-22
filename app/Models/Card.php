<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => $image != '' ? asset('/storage/' . $image) : 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->fullname) . '&background=4e73df&color=ffffff&size=100',
        );
    }
}
