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
</head>

<body>
    <div class="page">
        <div class="block-extra">
            <div class="block">
                <div class="block-aside">
                    {{-- <div class="profile-image"></div> --}}
                    <img class="profile-image" src="https://dummyimage.com/128x128/afc/000333.png&text=++FF+" />
                </div>
                <div class="block-content">
                    <h2>Ford Focus II</h2>

                    <div class="information">
                        <p>{{ __('Costs') }}: 33750</p>
                        <p>{{ __('Costs this year') }}: 33750</p>
                        <p>{{ __('Costs this month') }}: 33750</p>
                        <p>{{ __('Costs per month') }}: 33750</p>
                    </div>

                    <div class="buttons">
                        <a href="{{ route('car') }}" class="button button-primary">{{ __('Tasks') }}</a>
                        <a class="button button-secondary">{{ __('Edit') }}</a>
                        <a href="{{ route('index') }}" class="button button-secondary"
                            type="submit">{{ __('Garage') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <h1 class="section-title">{{ __('Costs') }}</h1>

            <div class="block-extra block-clickable">
                <div class="block">
                    <div class="block-content">
                        <p style="text-align: center">{{ __('Add new cost') }}</p>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Бензин</h2>
                        <p class="description">Литров: 22 (50р/л)</p>
                        <p class="statistics">
                            12.06.2023
                            -
                            5 000 руб.
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Расходники</h2>
                        <p class="description">Масло + салонный + воздушный + маслянный фильтры</p>
                        <p class="statistics">
                            12.06.2023
                            -
                            5 000 руб.
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Заменить воздушный фильтр</h2>
                        <p class="statistics">
                            Через 166 700 км (каждые 180 000 км)
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Заменить воздушный фильтр</h2>
                        <p class="statistics">
                            12 июля 2023 г.
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Заменить воздушный фильтр</h2>
                        <p class="statistics">
                            Через 22 дня (28 февраля 2023 г.)
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Заменить салонный фильтр</h2>
                        <p class="statistics">
                            Через 6 700 км (каждые 10 000 км)
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Восстановить пин на разьеме педали газа</h2>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>

            <div class="block-extra">
                <div class="block">
                    <div class="block-content">
                        <h2>Нечитаемый вин номер кузова</h2>
                        <p class="statistics">
                            15 июля 2023 г.
                        </p>
                    </div>
                    <div class="buttons buttons-aside">
                        <a href="{{ route('car') }}" class="button button-secondary">E</a>
                        <a href="{{ route('car') }}" class="button button-primary">V</a>
                    </div>
                </div>
            </div>
            {{--  --}}
        </div>
    </div>

</body>

</html>
