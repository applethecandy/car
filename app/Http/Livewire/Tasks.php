<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Task;
use Livewire\Component;

class Tasks extends Component
{
    public $car;

    protected $listeners = ['refresh' => '$refresh'/* , 'completeTask' => 'complete' */];
    
    public function mount(Car $car)
    {
        $this->car = Car::find($car->id);
    }

    public function render()
    {
        return view('livewire.tasks');
    }

   /*  public function complete(Task $task)
    {
        if ($task->type == 'every_mileage') {
            $this->emit('openModal', 'task-modal.complete', json_encode(['task' => $task->id, 'type' => $task->type]))
        } elseif ($task->type == 'every_date') {
            $this->emit('openModal', 'task-modal.complete', json_encode(['task' => $task->id, 'type' => $task->type]))
        } else {
            $task->delete();
        }
        $this->emitSelf('refresh');
    } */
}
