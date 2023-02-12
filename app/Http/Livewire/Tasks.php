<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class Tasks extends Component
{
    public $car_id;

    public function render()
    {
        return view('livewire.tasks', ['car' => Car::whereId($this->car_id)->with('tasks')->first()]);
    }
}
