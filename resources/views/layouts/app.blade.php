<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen overflow-hidden">
            {{-- Sidebar/Navigation --}}
            <aside id="sidebar" class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64  lg:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out -translate-x-64">
                @include('components.sidebar')
            </aside>
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
                {{-- Header --}}
                @include('components.header')
                {{-- Contents --}}
                <main>
                    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
