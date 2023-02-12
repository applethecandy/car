<div class="section">
    <h1 class="section-title">{{ __('Tasks') }}</h1>

    <div class="block-extra block-clickable">
        <div class="block">
            <div class="block-content">
                <p style="text-align: center">{{ __('Add new task') }}</p>
            </div>
        </div>
    </div>

    {{--  --}}
    @foreach ($car->tasks as $task)
        <div class="block-extra">
            <div class="block">
                <div class="block-content">
                    <h2>{{ $task->name }}</h2>
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
                                ({{ trans_choice('on :count :unit', $task->$type, ['unit' => __('km')]) }})
                            @else
                                @if ($task->isToday())
                                    {{ __('Today') }}
                                @else
                                    @if (!$task->isOverdue())
                                        {{ trans_choice('After :count :unit', abs($task->offset), ['unit' => trans_choice('day|days', abs($task->offset))]) }}
                                        ({{ $task->date->addDays($task->to_date)->format('d.m.Y') }})
                                    @else
                                        {{ trans_choice('It should have been done :count :unit ago', abs($task->offset), ['unit' => trans_choice('day|days', abs($task->offset))]) }}
                                        ({{ trans_choice('every :count :unit', $task->every_date, ['unit' => trans_choice('day|days', $task->every_date)]) }})
                                    @endif
                                @endif
                            @endif
                        </p>
                    @endif
                </div>
                <div class="buttons buttons-aside">
                    <a href="" class="button button-secondary">E</a>
                    <a href="" class="button button-primary">V</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
