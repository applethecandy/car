<div>
    <div class="modal-header">
        {{ __('Change mileage') }}
    </div>
    <div class="modal-content">
        <div class="form">
            <div class="form-item">
                {{ __('Current mileage') }}: {{ $car->mileage }}
            </div>
            <div class="form-item">
                <label to="mileage">{{ __('New mileage') }}</label>
                <input type="number" id="mileage" wire:model="mileage" placeholder="126048">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-primary" wire:click="$emit('changeMileage', {{ $mileage }})"> {{ __('Save') }}</button>
            <button class="button button-secondary" wire:click="$emit('closeModal')"> {{ __('Close') }}</button>
        </div>
    </div>
</div>
