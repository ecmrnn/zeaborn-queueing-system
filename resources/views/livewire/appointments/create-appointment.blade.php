<div x-data="{ show: true }" class="px-6 py-12">
   {{-- <x-validation-errors class="mb-4" /> --}}

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    
    {{-- Success message --}}
    
    @if (session('success'))
        <x-validation-success message="{{ session('success') }}" />
    @endif


    {{-- Appointment Header --}}
    <div class="mb-10 flex flex-col md:flex-row md:justify-between md:items-center gap-5">
        <hgroup>
            <h1 class="font-poppins text-primary text-3xl">
                @if (date("H") < 12)
                    Good Morning! 🍵
                @elseif (date("H") < 18)
                    Good Afternoon! 🌞
                @else
                    Good Evening! 💤
                @endif
            </h1>
            <p class="opacity-50 text-xs">Input your appointment details here</p>
        </hgroup>
        <div class="px-5 py-2 rounded-lg bg-primary">
            <time datetime="{{ date("Y-m-d") }}" class="text-right text-white font-bold">{{ date("F d, Y") }}</time>
            <p class="leading-none md:text-right text-white text-sm">Time in: <time class="font-bold" datetime="{{ date("h:i") }}">{{ date("h:i A") }}</time></p>
        </div>
    </div>

    {{-- Details to be filled by the visitor --}}
    <form class="grid md:grid-cols-2 gap-5" autocomplete="off" wire:submit="save">

        <div class="p-6 rounded-lg bg-white border border-gray-200">
            <h2 class="font-poppins text-xl text-primary">Personal Information</h2>
            <div class="mt-5 space-y-5">
                <div>
                    <x-label for="firstName" value="{{ __('First Name') }}" />
                    <x-input wire:model.live.debounce.250ms="firstName" id="firstName" class="block mt-2 w-full" type="text" name="firstName" placeholder="Juan" :value="old('text')" required autofocus />
                    @error('firstName')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    <x-label for="lastName" value="{{ __('Last Name') }}" />
                    <x-input wire:model.live.debounce.250ms="lastName" id="lastName" class="block mt-2 w-full" type="text" name="lastName" placeholder="Dela Cruz" :value="old('text')" required />
                    @error('lastName')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    <x-label for="rank" value="{{ __('Rank') }}" />
                    @if ($isOtherRankChecked)
                        <x-input wire:model.live.debounce.250ms="rank" id="rank" class="block mt-2 w-full" type="text" name="rank" placeholder="Specify your Rank" :value="old('text')" required />
                    @else
                        <x-input-select wire:model.live.debounce.250ms="rank" name="rank" id="rank" class="block mt-2 w-full" required>
                            <option value="">Select a Rank</option>
                            <optgroup label="Deck Officer">
                                <option value="Master">Master</option>
                                <option value="Chief Officer">Chief Officer</option>
                                <option value="Second Officer">Second Officer</option>
                                <option value="Third Officer">Third Officer</option>
                            </optgroup>
                            <optgroup label="Engine Officer">
                                <option value="Chief Engineer">Chief Engineer</option>
                                <option value="Second Engineer">Second Engineer</option>
                                <option value="Third Engineer">Third Engineer</option>
                                <option value="Fourth Engineer">Fourth Engineer</option>
                                <option value="Electro TechOfficer">Electro Tech Officer</option>
                                <option value="Electro TechRating">Electro Tech Rating</option>
                                <option value="Electro Assistant">Electro Assistant</option>
                            </optgroup>
                            <optgroup label="Ratings">
                                <option value="Able Bodied Seaman">Able Bodied Seaman</option>
                                <option value="Bosun">Bosun</option>
                                <option value="Chief Cook">Chief Cook</option>
                                <option value="Fitter">Fitter</option>
                                <option value="Messman">Messman</option>
                                <option value="Motorman / Oiler">Motorman / motormanOiler</option>
                                <option value="Ordinary Seaman">Ordinary Seaman</option>
                                <option value="Wiper">Wiper</option>
                            </optgroup>
                            <optgroup label="Cadet">
                                <option value="Deck Cadet">Deck Cadet</option>
                                <option value="Engine Cadet">Engine Cadet</option>
                            </optgroup>
                        </x-input-select>
                        @endif
                        @error('rank')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                        <div class="mt-1">
                            <button type="button" wire:click="$toggle('isOtherRankChecked')" class="px-3 py-1 rounded-lg bg-gray-100 border border-gray-200 text-sm">
                            {{ $isOtherRankChecked ? 'Select a Rank' : 'My rank is not here'}}
                        </button>
                    </div>
                </div>
                <div>
                    <x-label for="vessel" value="{{ __('Vessel') }}" />
                    <x-input wire:model.live.debounce.250ms="vessel" id="vessel" class="block mt-2 w-full" type="text" name="vessel" placeholder="Specify your Vessel" :value="old('text')" required />
                    @error('vessel')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="p-6 rounded-lg bg-white border border-gray-200">
            <h2 class="font-poppins text-xl text-primary">Appointment Details</h2>
            <div class="mt-5 space-y-5">
                <div>
                    <x-label for="appointmentTime" value="{{ __('Appointment Time') }}" />
                    <x-input-time wire:model.live.debounce.250ms="appointmentTime" id="appointmentTime" name="appointmentTime" class="block mt-2 w-full" required />
                    @error('appointmentTime')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    @if ($isOtherStaffChecked)
                        <x-label for="otherStaff" value="{{ __('Reporting Staff') }}" />
                        <x-input wire:model.live.debounce.250ms="otherStaff" id="otherStaff" class="block mt-2 w-full" type="text" name="reportingStaff" placeholder="Specify the name of Staff" :value="old('text')" required />
                        @error('otherStaff')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                    @else
                        <x-label for="reportingStaff" value="{{ __('Reporting Staff') }}" />
                        <x-input-select wire:model.live.debounce.250ms="reportingStaff" name="reportingStaff" id="reportingStaff" class="block mt-2 w-full" required>
                            <option value="" @selected(true)>Select a Staff</option>
                            <optgroup label="Person-in-Charge">
                                @foreach ($users as $user)
                                    <option key="{{ $user->id }}" value="{{ $user->id }}">{{ $user->first_name . " " . $user->last_name }}</option>
                                @endforeach
                            </optgroup>
                        </x-input-select>
                    @endif
                    @error('reportingStaff')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                    <div class="mt-1">
                        <button type="button" wire:click="$toggle('isOtherStaffChecked')" class="px-3 py-1 rounded-lg bg-gray-100 border border-gray-200 text-sm">
                            {{ $isOtherStaffChecked ? 'Select a Staff' : 'Staff is not listed here'}}
                        </button>
                    </div>
                </div>
                <div>
                    <x-label for="purpose" value="{{ __('Purpose') }}" />
                    @if ($isOtherPurposeChecked)
                       <x-input wire:model.live.debounce.250ms="purpose" id="purpose" class="block mt-2 w-full" type="text" name="purpose" placeholder="Specify your Purpose" :value="old('text')" required />
                    @else
                        <x-input-select wire:model.live.debounce.250ms="purpose" name="purpose" id="purpose" class="block mt-2 w-full" required>
                            <option value="">Select a Purpose</option>
                            <optgroup label="Purpose">
                                <option value="Documentation or Signing">Documentation &#47; Signing of Contract</option>
                                <option value="Dispatch">Dispatch</option>
                                <option value="Visa Application Processing">Visa Application &#47; Processing</option>
                                <option value="Request Sea Service">Request for Sea Service</option>
                                <option value="Anti-Piracy">Anti-Piracy</option>
                                <option value="Follow up">Follow up for Line up</option>
                                <option value="Disembarkation Report">Disembarkation Report</option>
                                <option value="AMOSUP">AMOSUP</option>
                                <option value="Accounting Matters">Accounting Matters</option>
                                <option value="Training Matters">Training Matters</option>
                                <option value="P&I matters">P&amp;I Matters</option>
                                <option value="Apply">Apply</option>
                            </optgroup>
                        </x-input-select>
                    @endif
                    <div class="mt-1">
                        <button type="button" wire:click="$toggle('isOtherPurposeChecked')" class="px-3 py-1 rounded-lg bg-gray-100 border border-gray-200 text-sm">
                            {{ $isOtherPurposeChecked ? 'Select a Purpose' : 'Other Purpose'}}
                        </button>
                    </div>
                </div>
                <x-button class="w-full">
                    {{ __('Send Appointment') }}
                </x-button>
            </div>
        </div>
    </form>
</div>