<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ChangeMileage extends ModalComponent
{
    public function render()
    {
        return view('livewire.change-mileage');
    }
}