@props(['min' => '08:00', 'max' => '17:00', 'name', 'id'])

<input type="time" name="{{ $name }}" id="{{ $id }}" min="{{ $min }}" max="{{ $max }}" {!! $attributes->merge(['class' => 'sm:min-w-[300px] border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg']) !!}>