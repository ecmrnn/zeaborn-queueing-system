@props(['message'])

<div
    x-data="{ open: true }"
    x-show="open"
    x-transition
    class="min-w-[300px] fixed top-5 right-5 flex justify-between rounded-lg bg-white border border-red-500 overflow-hidden">

    {{-- Validation Message --}}
    <div class="flex items-center">
        <div class="px-3 py-3 gird place-items-center bg-red-500">
            <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m424-408-86-86q-11-11-28-11t-28 11q-11 11-11 28t11 28l114 114q12 12 28 12t28-12l226-226q11-11 11-28t-11-28q-11-11-28-11t-28 11L424-408Zm56 328q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>
        </div>
        <div class="px-5 py-3">
            <p class="font-poppins text-sm text-red-500">{{ $message }}</p>
        </div>
    </div>

    {{-- Close --}}
    <button x-on:click="open = false" class="p-2 m-1 opacity-50 rounded-lg hover:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z"/></svg>
    </button>
</div>    