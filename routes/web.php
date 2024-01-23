<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('test');
});

Route::get('/', App\Livewire\Card\Create::class)->name('card.create');
Route::get('/{slug}', App\Livewire\Card\Show::class)->name('card.show');
Route::get('/index', App\Livewire\Card\Index::class)->name('card.index');
