<div>
    <div class="modal-header">
        {{ __('Delete car') }}
    </div>
    <div class="modal-content">
        {{ trans_choice('Are you sure you want to delete :car?', 0, ['car' => $car->name]) }}
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-secondary" wire:click="$emit('deleteCar')"> {{ __('Yes') }}</button>
            <button class="button button-primary" wire:click="$emit('closeModal')"> {{ __('No') }}</button>
        </div>
    </div>
</div>
