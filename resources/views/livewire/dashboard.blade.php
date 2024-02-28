<div class="w-full flex justify-between overflow-hidden sticky top-0">
    {{-- Dashboard Content --}}
    <div class="max-h-screen p-6 2xl:p-20 overflow-scroll flex flex-col flex-grow gap-10">
        {{-- Header --}}
        <div class="min-h-44 p-5 bg-primary rounded-lg flex justify-between">
            <hgroup class="text-white">
                <h1 class="capitalize leading-none text-3xl font-poppins">Hello, {{ Auth::user()->first_name }}</h1>
                <p>
                    @if ($status == 'active')
                        Work mode 🥸
                    @else
                        @if (date('H') < 12)
                            Breakfast muna 😋
                        @elseif (date('H') < 3)
                            Coffee Break 🍵
                        @else
                            'Di pa ba mag-out? 😪
                        @endif
                    @endif
                </p>
            </hgroup>
            <div>
                <input type="button"
                        wire:click="updateStatus"
                        wire:model="status"
                        value="{{ $status }}"
                        class="px-10 py-2 rounded-lg bg-white border border-gray-200 text-sm capitalize hover:cursor-pointer hover:bg-gray-50">
            </div>
        </div>

        {{-- Cards --}}
        <div class="grid gap-2 md:grid-cols-3 md:gap-5">
            <div class="p-5 bg-white rounded-lg border border-gray-200 flex gap-5">
                <div class="w-[60px] aspect-square grid place-items-center rounded-lg bg-primary shrink-0">
                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M40-240q-17 0-28.5-11.5T0-280v-23q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H40Zm240 0q-17 0-28.5-11.5T240-280v-25q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v25q0 17-11.5 28.5T680-240H280Zm500 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v23q0 17-11.5 28.5T920-240H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z"/></svg>
                </div>
                <div class="flex flex-col justify-center">
                    <p class="leading-none">Total Appointments</p>
                    <p class="text-primary text-2xl font-poppins">
                        {{ str_pad(count($appointments), 3, 0, STR_PAD_LEFT) }}
                    </p>
                </div>
            </div>
            
            <div class="p-5 bg-white rounded-lg border border-gray-200 flex gap-5">
                <div class="w-[60px] aspect-square grid place-items-center rounded-lg bg-primary shrink-0">
                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm800 112H738q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
                </div>
                <div class="flex flex-col justify-center">
                    <p class="leading-none">Pending Appointments</p>
                    <p class="text-primary text-2xl font-poppins">
                        {{ str_pad(count($pending), 3, 0, STR_PAD_LEFT) }}
                    </p>
                </div>
            </div>

            <div class="p-5 bg-white rounded-lg border border-gray-200 flex gap-5">
                <div class="w-[60px] aspect-square grid place-items-center rounded-lg bg-primary shrink-0">
                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m702-593 141-142q12-12 28.5-12t28.5 12q12 12 12 28.5T900-678L730-508q-12 12-28 12t-28-12l-85-85q-12-12-12-28.5t12-28.5q12-12 28-12t28 12l57 57ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-240v-32q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240Zm80 0h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 260Zm0-340Z"/></svg>
                </div>
                <div class="flex flex-col justify-center">
                    <p class="leading-none">Checked Appointments</p>
                    <p class="text-primary text-2xl font-poppins">
                        {{ str_pad($done, 3, 0, STR_PAD_LEFT) }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="p-5 bg-white rounded-lg border border-gray-200">
            <div class="mb-5 flex items-center gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-280q-33 0-56.5-23.5T120-360v-240q0-33 23.5-56.5T200-680h560q33 0 56.5 23.5T840-600v240q0 33-23.5 56.5T760-280H200Zm0-80h560v-240H200v240Zm-41-400q-17 0-28-11.5T120-800q0-17 11.5-28.5T160-840h641q17 0 28 11.5t11 28.5q0 17-11.5 28.5T800-760H159Zm0 640q-17 0-28-11.5T120-160q0-17 11.5-28.5T160-200h641q17 0 28 11.5t11 28.5q0 17-11.5 28.5T800-120H159Zm41-480v240-240Z"/></svg>
                <p>Recent Appointments</p>
            </div>

            <div class="overflow-scroll min-h-80">
                <table class="w-full min-w-[800px] border-separate border-spacing-0 border-spacing-y-1">
                    <thead>
                        <tr>
                            <th class="xl:hidden py-4 text-left bg-primary/10 rounded-s-lg"></th>
                            <th class="py-4 xl:pl-10 text-left bg-primary/10 xl:rounded-s-lg">Name</th>
                            <th class="py-4 text-left bg-primary/10">Rank</th>
                            <th class="w-1/4 py-4 text-left bg-primary/10">Purpose</th>
                            <th class="py-4 text-left bg-primary/10">Appointment Time</th>
                            <th class="py-4 text-left bg-primary/10 rounded-e-lg"></th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            @if ($appointment->status !== 'pending')
                                <tr key="{{$appointment->id}}">
                                    <td class="xl:hidden border-l border-y border-gray-200 bg-white rounded-s-lg">
                                        <button class="p-2 m-2 border border-transparent hover:bg-gray-50 hover:border-gray-200 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M360-240h240q17 0 28.5-11.5T640-280q0-17-11.5-28.5T600-320H360q-17 0-28.5 11.5T320-280q0 17 11.5 28.5T360-240Zm0-160h240q17 0 28.5-11.5T640-440q0-17-11.5-28.5T600-480H360q-17 0-28.5 11.5T320-440q0 17 11.5 28.5T360-400ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h287q16 0 30.5 6t25.5 17l194 194q11 11 17 25.5t6 30.5v447q0 33-23.5 56.5T720-80H240Zm280-560v-160H240v640h480v-440H560q-17 0-28.5-11.5T520-640ZM240-800v200-200 640-640Z"/></svg>
                                        </button>
                                    </td>
                                    <td class="xl:pl-10 xl:border-l border-y border-gray-200 bg-white xl:rounded-s-lg">{{ $appointment->first_name . " " . $appointment->last_name }}</td>
                                    <td class="border-y border-gray-200">{{ $appointment->rank }}</td>
                                    <td class="border-y border-gray-200">{{ $appointment->purpose }}</td>
                                    <td class="border-y border-gray-200">{{ date("h:i A", strtotime($appointment->appointment_time)) }}</td>
                                    <td class="hidden xl:block pr-5 border-r border-y border-gray-200 rounded-e-lg text-right">
                                        <button class="px-3 py-2 text-sm m-2 border hover:bg-gray-50 hover:border-gray-200 rounded-lg">
                                            View Appointment
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pending Appointments --}}
    <aside class="hidden min-w-[350px] 2xl:block h-screen overflow-scroll p-5 sticky top-0 bg-white border-l border-gray-200">
        <hgroup class="flex items-center gap-5">
            <svg class="fill-primary shrink-0" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm800 112H738q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
            <h2 class="text-primary text-xl font-poppins">Pending Appointments</h2>
        </hgroup>

        <div class="mt-10 min-w-[300px]">
            <div class="space-y-2">
                @foreach ($pending as $appointment)
                    <div key="{{ $appointment->id }}">
                        <div class="px-3 py-2 rounded-lg border border-gray-200 bg-white flex items-center justify-between gap-5">
                            <div>
                                <p>{{ $appointment->first_name . " " . $appointment->last_name }}</p>
                                <p class="text-sm truncate">{{ $appointment->purpose }}</p>
                            </div>
                            <button
                                wire:click="checkAppointment({{ $appointment->id }})"
                                wire:confirm="Tapos na talaga si {{ $appointment->first_name . " " . $appointment->last_name}}?"
                                class="px-3 py-2 text-white text-sm bg-primary rounded-lg hover:bg-primary-100">Done</button>
                        </div>
                        <div class="mt-2 px-3 flex justify-between">
                            <p class="text-xs opacity-50">Time in: {{ date_format($appointment->created_at, "h:i A") }}</p>
                            <p class="text-xs">App. Time: {{ date('h:i A', strtotime($appointment->appointment_time)) }}</p>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </aside>
</div>
