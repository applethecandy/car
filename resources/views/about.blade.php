<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div
            class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
            <div class="mx-auto max-w-md">
                <h1 class="text-2xl font-medium">Car</h1>
                <div class="divide-y divide-gray-300/50">
                    <div class="space-y-6 py-8 text-base leading-7 text-gray-600">
                        <p>Приложение, позволяющее не забыть ближайшие замены расходников, ТО, оплату страховки и любые другие задачи, связанные с автомобилем.</p>
                    </div>
                    <div class="pt-8 text-base font-semibold leading-7">
                        <p class="flex flex-col">
                            <a href="{{ route('auth.vkontakte') }}"
                                class="text-sky-500 hover:text-sky-600">{{ __('Sign in with VK') }} &rarr;</a>
                            <a href="{{ route('auth.yandex') }}"
                                class="text-sky-500 hover:text-sky-600">{{ __('Sign in with Yandex') }} &rarr;</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
