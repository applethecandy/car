<?php

namespace App\Http\Livewire\TaskModal;

use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public function render()
    {
        return view('livewire.task-modal.edit');
    }
}
