<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class Tasks extends Component
{
    public $car;

    protected $listeners = ['refresh' => '$refresh'];
    
    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
