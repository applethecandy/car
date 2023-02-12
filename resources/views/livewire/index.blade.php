
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
                                <p>{{ __('Closest tasks') }}: {{ 5 . ' ' . trans_choice('task|tasks', 5) }} </p>
                            </div>
                            <div class="buttons">
                                <a href="{{ route('car', ['id' => $car->id]) }}"
                                    class="button button-primary">{{ __('Choose') }}</a>
                                <a class="button button-secondary">{{ __('Change mileage') }}</a>
                                <button class="button button-secondary"
                                    onclick="Livewire.emit('openModal', 'change-mileage')">Edit User</button>
                                <a class="button button-secondary">{{ __('Edit') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="block-extra block-clickable">
                <div class="block">
                    <div class="block-content">
                        <p style="text-align: center">{{ __('Add new car') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
