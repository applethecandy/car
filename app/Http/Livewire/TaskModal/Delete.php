<?php

namespace App\Http\Livewire\TaskModal;

use App\Models\Task;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $task;
    
    protected $listeners = ['deleteTask' => 'destroy'];

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.task-modal.delete');
    }

    public function destroy()
    {
        $this->task->delete();
        $this->forceClose()->closeModal();
        $this->emit('refresh');
    }
}
