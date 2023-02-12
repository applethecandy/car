<div>
    <div class="modal-header">
        Удалить автомобиль
    </div>
    <div class="modal-content">
        Вы уверены, что хотите удалить автомобиль {{ $car->name }}?
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-secondary" wire:click="$emit('deleteCar')"> {{ __('Yes') }}</button>
            <button class="button button-primary" wire:click="$emit('closeModal')"> {{ __('No') }}</button>
        </div>
    </div>
</div>
