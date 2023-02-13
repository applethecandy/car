<?php

namespace App\Http\Livewire\TaskModal;

use App\Models\Car;
use App\Models\Task;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $task_type;
    public $name;
    public $description;
    public $date;
    public $to_date;
    public $every_date;
    public $mileage;
    public $to_mileage;
    public $every_mileage;
    public $car;
    public $task;
    
    protected $listeners = ['taskTypeChanged', 'editTask' => 'update'];

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->car = $this->task->car;

        $this->task_type = $this->task->type;
        $this->name = $this->task->name;
        $this->description = $this->task->description;
        if ($this->task->date) {
            $this->date = $this->task->date->format('Y-m-d');
        }
        $this->to_date = $this->task->to_date;
        $this->every_date = $this->task->every_date;
        $this->mileage = $this->task->mileage;
        $this->to_mileage = $this->task->to_mileage;
        $this->every_mileage = $this->task->every_mileage;
    }

    public function render()
    {
        return view('livewire.task-modal.edit');
    }
    
    public function taskTypeChanged($task_type) 
    {
        $this->task_type = $task_type;
    }

    public function update(/* $params */)
    {
        // extract($params);

        $task = [
            'name' => $this->name,
            'description' => $this->description,
            'mileage' => NULL,
            'to_mileage' => NULL,
            'every_mileage' => NULL,
            'date' => NULL,
            'to_date' => NULL,
            'every_date' => NULL,
        ];

        switch ($this->task_type) {
            case 'to_mileage':
                $task['to_mileage'] = $this->to_mileage;
                break;
            case 'every_mileage':
                $task['mileage'] = $this->mileage;
                $task['every_mileage'] = $this->every_mileage;
                break;
            case 'to_date':
                $task['date'] = date('Y-m-d');
                $task['to_date'] = $this->to_date;
                break;
            case 'every_date':
                $task['date'] = $this->date;
                $task['every_date'] = $this->every_date;
                break;
        }

        $this->task->update($task);

        // Task::create($task);
        $this->closeModal();
        $this->emit('refresh');
    }
}
