<div>
    @php
        date_default_timezone_set('Europe/Moscow');
    @endphp
    <div class="modal-header">
        Добавить новую задачу
    </div>
    <div class="modal-content">
        <div class="form">
            <div class="form-item">
                <label for="name">Название задачи</label>
                <input type="text" id="name" wire:model="name" placeholder="Заменить масло">
            </div>
            <div class="form-item">
                <label for="description">Описание</label>
                <textarea wire:model="description"></textarea>
            </div>
            <div class="form-item">
                <label for="description">Тип задачи</label>
                {{-- <select name="cars" id="cars"> --}}
                <div class="input-radio">
                    <input checked wire:change="taskTypeChanged($event.target.value)" type="radio" name="type" value="none" id="none"><label for="none">Простая задача</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" type="radio" name="type" value="to_date" id="to_date"><label for="to_date">До определенной даты</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" type="radio" name="type" value="every_date" id="every_date"><label for="every_date">Повторять каждые N дней</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" type="radio" name="type" value="to_mileage" id="to_mileage"><label for="to_mileage">До определенного пробега</label>
                </div>
                <div class="input-radio">
                    <input wire:change="taskTypeChanged($event.target.value)" type="radio" name="type" value="every_mileage" id="every_mileage"><label for="every_mileage">Повторять каждые N километров</label>
                </div>
                @if ($task_type == 'to_date')
                    <div class="form-item">
                        <label for="description">Через сколько дней задача должна быть выполнена</label>
                        <input type="number" wire:model="to_date">
                        <p>{{ $to_date ? "Задача должна быть выполненной к " . date('d.m.Y', strtotime(date('Y-m-d') . " + $to_date days")) : '' }}</p>
                    </div>
                @endif
                @if ($task_type == 'every_date')
                <div class="form-item">
                    <label for="description">Выберите дату последнего выполнения</label>
                    <input type="date" wire:model="date">
                </div>
                <div class="form-item">
                    <label for="description">Повторять каждое количество дней</label>
                    <input type="number" wire:model="every_date">
                    <p>{{ $every_date && $date ? "Следующая дата: " . date('d.m.Y', strtotime("$date + $every_date days")) : '' }}</p>
                </div>
                @endif
                @if ($task_type == 'to_mileage')
                    <div class="form-item">
                        <label for="description">На каком пробеге задача должна быть выполнена</label>
                        <input type="number" wire:model="to_mileage" placeholder="{{ $car->mileage }}">
                    </div>
                @endif
                @if ($task_type == 'every_mileage')
                <div class="form-item">
                    <label for="description">На каком пробеге задача была выполнена в последний раз</label>
                    <input type="number" wire:model="mileage" placeholder="{{ $car->mileage }}">
                </div>
                <div class="form-item">
                    <label for="description">Повторять каждое количество километров</label>
                    <input type="number" wire:model="every_mileage" placeholder="10000">
                    <p>{{ $mileage && $every_mileage ? "Следующий пробег: " . $mileage + $every_mileage : '' }}</p>
                </div>
                @endif
                {{-- </select> --}}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="buttons">
            <button class="button button-primary" wire:click="$emit('createTask', {{ json_encode(['car' => $car->id, 'name' => $name, 'description' => $description, 'mileage' => $mileage, 'to_mileage' => $to_mileage, 'every_mileage' => $every_mileage, 'date' => $date, 'to_date' => $to_date, 'every_date' => $every_date]) }})"> {{ __('Save') }}</button>
            <button class="button button-secondary" wire:click="$emit('closeModal')"> {{ __('Close') }}</button>
        </div>
    </div>
</div>
