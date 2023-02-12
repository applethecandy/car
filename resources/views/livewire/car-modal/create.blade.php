<div>
    <div class="modal-header">
        Добавить новую машину
    </div>
    <div class="modal-content">
        <div class="form">
            <div class="form-item">
                <label to="name">Название автомобиля</label>
                <input type="text" id="name" wire:model="name" placeholder="Volkswagen Transporter 4">
            </div>
            <div class="form-item">
                <label to="mileage">Пробег</label>
                <input type="number" id="mileage" wire:model="mileage" placeholder="126048">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-primary" wire:click="$emit('createCar', {{ json_encode(['name' => $name, 'mileage' => $mileage]) }})"> {{ __('Save') }}</button>
            <button class="button button-secondary" wire:click="$emit('closeModal')"> {{ __('Close') }}</button>
        </div>
    </div>
</div>
