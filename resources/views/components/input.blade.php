@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-[300px] border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg']) !!}>
