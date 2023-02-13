<?php

namespace App\Http\Livewire\TaskModal;

use App\Models\Task;
use LivewireUI\Modal\ModalComponent;

class Complete extends ModalComponent
{
    public $task;
    public $date;
    public $mileage;

    protected $listeners = ['completeTask' => 'complete'];

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->date = date('Y-m-d');
        $this->mileage = $task->car->mileage;
    }

    public function render()
    {
        return view('livewire.task-modal.complete');
    }

    public function complete()
    {
        if ($this->task->type == 'every_mileage') {
            $this->task->update(['mileage' => $this->mileage]);
        } elseif ($this->task->type == 'every_date') {
            $this->task->update(['date' => $this->date]);
        } else {
            $this->task->delete();
        }
        $this->closeModal();
        $this->emit('refresh');
    }
}
