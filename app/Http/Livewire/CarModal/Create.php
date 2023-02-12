<?php

namespace App\Http\Livewire\CarModal;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $name;
    public $mileage;

    protected $listeners = ['createCar' => 'store'];

    public function render()
    {
        return view('livewire.car-modal.create');
    }

    public function store($params)
    {
        extract($params);
        Car::create([
            'user_id' => Auth::user()->id,
            'name' => $name,
            'mileage' => $mileage,
            'image_path' => 'https://api.cloudhostica.com/dummyImage/128/jpg/7bf/fff/' . preg_replace('/((\b\w|[0-9])|.)/u', '$2', $name),
        ]);
        $this->closeModal();
        $this->emitTo('index', 'refresh');
    }
}
