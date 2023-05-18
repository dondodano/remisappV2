<?php

namespace App\Http\Livewire\Sample;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.sample.index')
            ->extends('livewire.template.master')
            ->section('contents');
    }
}
