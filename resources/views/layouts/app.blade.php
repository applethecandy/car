<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <style>
        .modal {
            padding: 1rem;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-radio > input {
            margin-right: 5px;
        }

        .form-item input:not([type="radio"]), .form-item textarea {
            border: none;
            border: 2px solid rgb(0 0 0 / 15%);
            padding: 12px 10px;
            font-size: 16px;
            resize: none;
            margin-top: 7px;
            margin-bottom: 16px;
            border-radius: 10px;
            color: #243342;
            outline-color: #243342;
            outline-width: thin;
            -webkit-appearance: none;
        }

        .form-item input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: 2px solid rgb(0 0 0 / 15%);
        }

        .form-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .modal-header {
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgb(0 0 0 / 10%);
            font-weight: bold;
            font-size: 14pt;
        }

        .modal-footer {
            display: flex;
            flex-direction: row-reverse;
            margin-top: 1rem;
            padding-top: 0.75rem;
            border-top: 1px solid rgb(0 0 0 / 10%);
        }

        .livewire-ui-modal {
            overflow-y: auto;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
        }

        .modal-wrapper {
            display: block;
            padding: 0;
            text-align: center;
            justify-content: center;
            align-items: flex-end;
            min-height: 100vh;
        }

        .overflow-y-hidden {
            overflow-y: hidden;
        }

        .modal {
            /* md:max-w-xl lg:max-w-2xl */
            margin-top: 2rem;
            margin-bottom: 2rem;
            vertical-align: middle;
            width: 100%;
            max-width: 28rem;
            
            transform: translate(0px, 0px);


            display: inline-block;
            overflow: hidden;
            background-color: #ffffff;
            text-align: left;
            width: 100%;
            border-radius: 0.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .modal-close {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* z-index: -1; */
        }

        .modal-background {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #6B7280;
            opacity: 0.75;
        }

        .modal-d {
            display: inline-block;
            vertical-align: middle;
            height: 100vh;
        }

        @media (max-width: 576px) {
            .modal-d {
                display: none;
            }

            .modal-wrapper {
                display: flex;
                padding-left: 1rem;
                padding-right: 1rem;
                padding-top: 1rem;
                padding-bottom: 2.5rem;
            }

            .modal {

                vertical-align: bottom;
            }
        }

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

        .button {
            font-family: 'Nunito';
            font-size: 1em;
            padding: 6px 12px;
            border-radius: 10px;
            border: none;
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
        }
    </style>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite([])
</head>

<body>
    {{ $slot }}
    @livewireScripts
    @livewire('livewire-ui-modal')
</body>

</html>
