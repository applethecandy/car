<div>
    Нынешний пробег: {{ $car->mileage }}
    <br>
    Новый пробег:
    <input type="number" wire:model="mileage">
    <button class="button button-primary" wire:click="$emit('changeMileage', {{ $mileage }})"> {{ __('Save') }}</button>
    <button class="button button-secondary" wire:click="$emit('closeModal')"> {{ __('Close') }}</button>
</div>
