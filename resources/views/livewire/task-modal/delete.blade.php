<div>
    <div class="modal-header">
        {{ __('Delete task') }}
    </div>
    <div class="modal-content">
        {{ trans_choice('Are you sure you want to delete :task?', 0, ['task' => $task->name]) }}
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-secondary" wire:click="$emit('deleteTask')"> {{ __('Yes') }}</button>
            <button class="button button-primary" wire:click="$emit('closeModal')"> {{ __('No') }}</button>
        </div>
    </div>
</div>
