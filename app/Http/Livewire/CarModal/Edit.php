<?php

namespace App\Http\Livewire\CarModal;

use App\Models\Car;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $car;
    public $name;
    public $mileage;
    public $return;

    protected $listeners = ['editCar' => 'update'];
    
    public function mount(Car $car)
    {
        $this->car = $car;
        $this->mileage = $car->mileage;
        $this->name = $car->name;
    }

    public function render()
    {
        return view('livewire.car-modal.edit');
    }

    public function update($params)
    {
        extract($params);
        $this->car->update(['mileage' => $mileage, 'name' => $name]);
        $this->closeModal();
        $this->emit('refresh');
    }
}
