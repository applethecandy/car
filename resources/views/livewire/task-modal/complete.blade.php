<div>
    <div class="modal-header">
        {{ $task->name }}
    </div>
    <div class="modal-content">
        <div class="form">
            @if ($task->type == 'every_mileage')
                <div class="form-item">
                    {{ __('At what mileage was the task completed last time') }}
                    <input type="number" wire:model="mileage">
                </div>
            @elseif ($task->type == 'every_date')
                <div class="form-item">
                    {{ __('Select the date of the last execution') }}
                    <input type="date" wire:model="date">
                </div>
            @else
                {{ __('When the task is completed, it will be deleted') }}
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-primary" wire:click="$emit('completeTask')">{{ __('Confirm') }}</button>
            <button class="button button-secondary" wire:click="$emit('closeModal')">{{ __('Close') }}</button>
        </div>
    </div>
</div>
