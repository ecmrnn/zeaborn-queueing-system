@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary sm:border sm:border-primary/25 text-start text-base font-medium bg-primary/10 focus:outline-none transition duration-150 ease-in-out sm:rounded-lg'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent sm:border text-start text-base font-medium hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out sm:rounded-lg';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
