<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ URL::to('/') }}/favicon_io/favicon.ico" type="image/x-icon">
              
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <x-banner />

        <div class="min-h-screen xl:flex">
            @livewire('navigation-menu')

            <main class="flex-grow">
                <!-- Page Heading -->
                @if (isset($header))
                    <header>
                        {{ $header }}
                    </header>
                @endif
                
                <!-- Page Content -->
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
