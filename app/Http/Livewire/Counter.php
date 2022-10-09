<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
class Counter extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.counter', [
            'users' => User::where('name', $this->search)->get(),
        ]);
    }
}
