<div>
    <div class="modal-header">
        {{ __('Change task') }}
    </div>
    <div class="modal-content">
        <div class="form">
            <div class="form-item">
                <label for="name">{{ __('Task name') }}</label>
                <input type="text" id="name" wire:model="name" placeholder="{{ __('Change oil') }}">
            </div>
            <div class="form-item">
                <label for="description">{{ __('Description') }}</label>
                <textarea wire:model="description"></textarea>
            </div>
            <div class="form-item">
                <p>{{ __('Task type') }}</p>
                {{-- <select name="cars" id="cars"> --}}
                <div class="input-radio">
                    <input checked wire:change="taskTypeChanged($event.target.value)" wire:model="task_type" type="radio" name="type" value="none" id="none"><label for="none">{{ __('Simple task') }}</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" wire:model="task_type" type="radio" name="type" value="to_date" id="to_date"><label for="to_date">{{ __('Task before a specific date') }}</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" wire:model="task_type" type="radio" name="type" value="every_date" id="every_date"><label for="every_date">{{ __('Recurring task (by time)') }}</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" wire:model="task_type" type="radio" name="type" value="to_mileage" id="to_mileage"><label for="to_mileage">{{ __('Task up to a certain mileage') }}</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" wire:model="task_type" type="radio" name="type" value="every_mileage" id="every_mileage"><label for="every_mileage">{{ __('Recurring task (by mileage)') }}</label>
                </div>
                @if ($task_type == 'to_date')
                    <div class="form-item">
                        <label for="description">{{ __('In how many days should the task be completed') }}</label>
                        <input type="number" wire:model="to_date">
                        <p>{{ $to_date ? trans_choice('The task should be completed by :date', 0, ['date' => date('d.m.Y', strtotime(date('Y-m-d') . " + $to_date days"))]) : '' }}</p>
                    </div>
                @endif
                @if ($task_type == 'every_date')
                <div class="form-item">
                    <label for="description">{{ __('Select the date of the last execution') }}</label>
                    <input type="date" wire:model="date">
                </div>
                <div class="form-item">
                    <label for="description">{{ __('Repeat every number of days') }}</label>
                    <input type="number" wire:model="every_date">
                    <p>{{ $every_date && $date ? __('Next date') . ": " . date('d.m.Y', strtotime("$date + $every_date days")) : '' }}</p>
                </div>
                @endif
                @if ($task_type == 'to_mileage')
                    <div class="form-item">
                        <label for="description">{{ __('At what mileage should the task be completed') }}</label>
                        <input type="number" wire:model="to_mileage" placeholder="{{ $car->mileage }}">
                    </div>
                @endif
                @if ($task_type == 'every_mileage')
                <div class="form-item">
                    <label for="description">{{ __('At what mileage was the task completed last time') }}</label>
                    <input type="number" wire:model="mileage" placeholder="{{ $car->mileage }}">
                </div>
                <div class="form-item">
                    <label for="description">{{ __('Repeat every number of kilometers') }}</label>
                    <input type="number" wire:model="every_mileage" placeholder="10000">
                    <p>{{ $mileage && $every_mileage ? __('Next mileage') . ": " . $mileage + $every_mileage : '' }}</p>
                </div>
                @endif
                {{-- </select> --}}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-primary" wire:click="$emit('editTask')"> {{ __('Save') }}</button>
            <button class="button button-primary" wire:click="$emit('openModal', 'task-modal.delete', {{ json_encode(['task' => $task->id]) }})"> {{ __('Delete') }}</button>
            <button class="button button-secondary" wire:click="$emit('closeModal')"> {{ __('Close') }}</button>
        </div>
    </div>
</div>
