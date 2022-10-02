<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Opps!</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none;
        }

        .show {
            display: block;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased" style="background-color: #F0F4F8">
    <div class="text-center">
        <h1 class="text-[13rem] font-bold">404</h1>
        <h3 class="text-3xl">
            Look like you're lost!
        </h3>
    </div>

    <div class="flex items-center justify-center">
        <a href="{{ route('dashboard') }}"
            class="my-10 px-6 py-2 bg-slate-900 hover:bg-slate-700 text-white text-2xl rounded">Take me back</a>
    </div>
</body>

</html>
