<?php

use App\Http\Livewire\Sample\Index;
use Illuminate\Support\Facades\Route;


Route::get('/', Index::class);
Route::get('/test', function(){
    return view('livewire.sample.test');
});
