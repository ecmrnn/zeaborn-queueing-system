@props(['name', 'id'])

<select name="{{ $name }}" id="{{ $id }}" {!! $attributes->merge(['class' => 'sm:w-[300px] border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg']) !!}>
    {{ $slot }}
</select>