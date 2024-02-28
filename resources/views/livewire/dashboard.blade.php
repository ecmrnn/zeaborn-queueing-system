<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('Hello, ' . Auth::user()->first_name) }}
        </h2>
    </x-slot>

    <div>
        <h1>Hello world</h1>
    </div>
</x-app-layout>
