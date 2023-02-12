<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {


        if (Auth::check()) {
            $user = Auth::user()->with('cars')->first();

            return view('livewire.index', compact('user'));
        } else {
            return view('about');
        }
    }
}
