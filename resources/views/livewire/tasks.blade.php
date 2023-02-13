<div class="page">
    <div class="block-extra">
        <div class="block">
            <div class="block-aside">
                @if ($car->image_path)
                    <img class="profile-image" src="{{ $car->image_path }}" />
                @else
                    <img class="profile-image" src="https://dummyimage.com/128x128/afc/000333.png&text=++FF+" />
                @endif
            </div>
            <div class="block-content">
                <h2>{{ $car->name }}</h2>

                <div class="information">
                    <p>{{ __('Mileage') }}: {{ $car->mileage }}</p>
                </div>

                <div class="buttons">
                    <a class="button button-primary" wire:click="$emit('openModal', 'change-mileage', {{ json_encode(['car' => $car->id]) }})">{{ __('Change mileage') }}</a>
                    {{-- <a href="{{ route('costs') }}" class="button button-primary">{{ __('Costs') }}</a> --}}
                    <a class="button button-secondary" wire:click="$emit('openModal', 'car-modal.edit', {{ json_encode(['car' => $car->id]) }})">{{ __('Edit') }}</a>
                    <a href="{{ route('index') }}" class="button button-secondary"
                        type="submit">{{ __('Garage') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <h1 class="section-title">{{ __('Tasks') }}</h1>

        <div class="block-extra block-clickable">
            <div class="block">
                <div class="block-content">
                    <p style="text-align: center" wire:click="$emit('openModal', 'task-modal.create', {{ json_encode(['car' => $car->id]) }})">{{ __('Add new task') }}</p>
                </div>
            </div>
        </div>

        @foreach ($car->tasks->sortBy('sort_offset') as $task)
            <div class="block-extra" wire:key="task-{{ $task->id }}">
                <div class="block">
                    <div class="block-content">
                        <h2>
                            @if ($task->isOverdue())
                                <span class="mark red">⬤</span>
                            @endif
                            {{ $task->name }}
                        </h2>
                        @empty(!$task->description)
                            <p class="description">{{ $task->description }}</p>
                        @endempty
                        @php $type = $task->type; @endphp
                        @if ($type != 'none')
                            <p class="statistics">
                                @if ($type == 'to_mileage' || $type == 'every_mileage')
                                    @if (!$task->isOverdue())
                                        {{ trans_choice('After :count :unit', abs($task->offset), ['unit' => __('km')]) }}
                                    @else
                                        {{ trans_choice('It should have been done :count :unit ago', abs($task->offset), ['unit' => __('km')]) }}
                                    @endif
                                    ({{ trans_choice(($type == 'to_mileage' ? 'on' : 'every') . ' :count :unit', $task->$type, ['unit' => __('km')]) }})
                                @else
                                    @if ($task->isToday())
                                        {{ __('Today') }}
                                    @else
                                        @if (!$task->isOverdue())
                                            {{ trans_choice('After :count :unit', abs($task->offset), ['unit' => trans_choice('day|days', abs($task->offset))]) }}
                                        @else
                                            {{ trans_choice('It should have been done :count :unit ago', abs($task->offset), ['unit' => trans_choice('day|days', abs($task->offset))]) }}
                                            ({{ trans_choice('every :count :unit', $task->every_date, ['unit' => trans_choice('day|days', $task->every_date)]) }})
                                        @endif
                                        @if ($type == 'to_date')
                                            ({{ $task->date->addDays($task->to_date)->format('d.m.Y') }})
                                        @else
                                            ({{ $task->date->addDays($task->every_date)->format('d.m.Y') }}, {{ trans_choice('every :count :unit', $task->every_date, ['unit' => trans_choice('day|days', $task->every_date)]) }})
                                        @endif
                                    @endif
                                @endif
                            </p>
                        @endif
                    </div>
                    <div class="buttons buttons-aside">
                        <button wire:click="$emit('openModal', 'task-modal.edit', {{ json_encode(['task' => $task->id]) }})" class="button button-secondary">E</button>
                        <button {{-- wire:click="$emit('completeTask', {{ json_encode(['task' => $task->id]) }})" --}} wire:click="$emit('openModal', 'task-modal.complete', {{ json_encode(['task' => $task->id]) }})" class="button button-primary">V</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
