<?php

namespace App\Http\Livewire\TaskModal;

use App\Models\Car;
use App\Models\Task;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
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

    protected $listeners = ['taskTypeChanged', 'createTask' => 'store'];

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->mileage = $car->mileage;
        $this->to_mileage = $car->mileage;
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.task-modal.create');
    }

    public function taskTypeChanged($task_type) 
    {
        $this->task_type = $task_type;
    }

    public function store($params)
    {
        extract($params);

        $task = [
            'car_id' => $car,
            'name' => $name,
            'description' => $description,
        ];

        switch ($this->task_type) {
            case 'to_mileage':
                $task['to_mileage'] = $to_mileage;
                break;
            case 'every_mileage':
                $task['mileage'] = $mileage;
                $task['every_mileage'] = $every_mileage;
                break;
            case 'to_date':
                $task['date'] = date('Y-m-d');
                $task['to_date'] = $to_date;
                break;
            case 'every_date':
                $task['date'] = $date;
                $task['every_date'] = $every_date;
                break;
        }

        Task::create($task);
        $this->closeModal();
        $this->emit('refresh');
    }
}
