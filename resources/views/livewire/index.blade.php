
    <div class="page">
        <div class="block-extra">
            <div class="block">
                <div class="block-aside">
                    {{-- <div class="profile-image"></div> --}}
                    <img class="profile-image" src="{{ $user->profile_photo_path }}" />
                </div>
                <div class="block-content">
                    <h2>{{ $user->name }}</h2>

                    <div class="buttons">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="button button-secondary" type="submit">{{ __('Sign out') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <h1 class="section-title">{{ __('Garage') }}</h1>
            @foreach ($user->cars as $car)
                <div class="block-extra">
                    <div class="block">
                        <div class="block-aside">
                            {{-- <div class="profile-image"></div> --}}
                            @if ($car->image_path)
                                <img class="profile-image" src="{{ $car->image_path }}" />
                            @else
                                <img class="profile-image"
                                    src="https://dummyimage.com/128x128/afc/000333.png&text=++FF+" />
                            @endif
                        </div>
                        <div class="block-content">
                            <h2>{{ $car->name }}</h2>
                            <div class="information">
                                <p>{{ __('Mileage') }}: {{ $car->mileage }}</p>
                                @if ($car->closest_tasks->count() > 0)
                                    <p>{{ __('Closest tasks') }}: {{ trans_choice(':count task|tasks', $car->closest_tasks->count()) }}</p>
                                @endif
                                @if ($car->overdue_tasks->count() > 0)
                                    <p class="mark red">{{ __('Overdue tasks') }}: {{ trans_choice(':count task|tasks', $car->overdue_tasks->count()) }}</p>
                                @endif
                            </div>
                            <div class="buttons">
                                <a href="{{ route('tasks', ['car' => $car->id]) }}"
                                    class="button button-primary">{{ __('Choose') }}</a>
                                <a class="button button-secondary" wire:click="$emit('openModal', 'change-mileage', {{ json_encode(['car' => $car->id]) }})">{{ __('Change mileage') }}</a>
                                <a class="button button-secondary" wire:click="$emit('openModal', 'car-modal.edit', {{ json_encode(['car' => $car->id]) }})">{{ __('Edit') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="block-extra block-clickable">
                <div class="block">
                    <div class="block-content">
                        <p style="text-align: center" wire:click="$emit('openModal', 'car-modal.create')">{{ __('Add new car') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
