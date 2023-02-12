<?php

namespace App\Http\Livewire;

use App\Models\Car;
use LivewireUI\Modal\ModalComponent;

class ChangeMileage extends ModalComponent
{
    protected $listeners = ['changeMileage' => 'update'];

    public $car;
    public $mileage;

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->mileage = $car->mileage;
    }

    public function render()
    {
        return view('livewire.change-mileage');
    }

    public function update($mileage)
    {
        $this->car->update(['mileage' => $mileage]);
        $this->closeModal();
        $this->emit('refresh');
    }
}
