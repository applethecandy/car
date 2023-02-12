<?php

namespace App\Http\Livewire\CarModal;

use App\Models\Car;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $car;
    
    protected $listeners = ['deleteCar' => 'destroy'];

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function render()
    {
        return view('livewire.car-modal.delete');
    }

    public function destroy()
    {
        $this->car->delete();
        $this->forceClose()->closeModal();
        $this->emit('refresh');
        if (str_replace(url('/'), '', url()->previous()) != '/') {
            return redirect()->route('index');
        }
    }
}
