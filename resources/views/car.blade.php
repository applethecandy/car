<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Nunito';
            background-color: #eef1f4;
        }

        .page {
            padding: 2rem 2rem 1rem;
            max-width: 740px;
            margin: 0 auto;
        }

        .section {
            padding: 2rem 0;
        }

        .section-title {
            text-align: center;
        }

        .block-extra {
            background-color: #fff;
            -webkit-font-smoothing: subpixel-antialiased;
            -moz-osx-font-smoothing: subpixel-antialiased;
            box-shadow: 0 2px 4px 0 rgb(0 0 0 / 5%);
            border-radius: 6px;
        }

        .block-clickable {
            background: rgb(255 255 255 / 60%);
            color: rgb(0 0 0 / 60%);
            transition: ease-in-out .2s;
        }

        .block-clickable:hover {
            cursor: pointer;
            background: rgb(255 255 255);
            color: rgb(0 0 0);
        }

        .block {
            padding: 1.25rem 1.5rem;
            margin: 0.85rem 0;
            display: flex;
        }

        .block-aside {
            margin-right: 1rem;
        }

        .block-content {
            width: -webkit-fill-available;
            display: flex;
            flex-direction: column;
            gap: 5px;
            justify-content: space-between;
        }

        h2 {
            transition: ease-in-out .2s;
        }

        .profile-image {
            width: 128px;
            height: 128px;
            border-radius: 50%;
            transition: ease-in-out .2s;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .buttons-aside {
            flex-direction: row-reverse;
        }

        .button {
            font-family: 'Nunito';
            font-size: 1em;
            padding: 6px 12px;
            border-radius: 10px;
            transition: ease-in-out .1s;
            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            background-color: #77f;
            color: white;
        }

        .button-primary:hover {
            background-color: #99f;
        }

        .button-primary:active {
            background-color: #55f;
        }

        .button-secondary {
            background-color: transparent;
            color: #666;
            border: 1px solid #ccc;
        }

        .button-secondary:hover {
            background-color: #ccc;
            color: black;
        }

        .button-secondary:active {
            background-color: #aaa;
            color: black;
        }

        .statistics {
            color: gray;
        }

        @media (max-width: 576px) {
            .profile-image {
                width: 64px;
                height: 64px;
            }

            h2 {
                font-size: 1em;
            }

            .button {
                font-size: .8em;
                padding: 4px 8px;
            }

            .statistics {
                font-size: .8em;
            }
        }
    </style>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite([])
    @livewireStyles
</head>

<body>
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
                        <a class="button button-primary">{{ __('Change mileage') }}</a>
                        <a href="{{ route('costs') }}" class="button button-primary">{{ __('Costs') }}</a>
                        <a class="button button-secondary">{{ __('Edit') }}</a>
                        <a href="{{ route('index') }}" class="button button-secondary"
                            type="submit">{{ __('Garage') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @livewire('tasks', ['car_id' => $car->id])
    </div>
    @livewireScripts
</body>

</html>
