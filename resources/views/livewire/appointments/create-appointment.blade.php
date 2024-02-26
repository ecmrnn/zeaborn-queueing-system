<div class="px-6 py-12">
   {{-- <x-validation-errors class="mb-4" /> --}}

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
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
                    <x-input wire:model.blur="firstName" id="firstName" class="block mt-2 w-full" type="text" name="firstName" placeholder="Juan" :value="old('text')" required autofocus />
                    @error('firstName')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    <x-label for="lastName" value="{{ __('Last Name') }}" />
                    <x-input wire:model.blur="lastName" id="lastName" class="block mt-2 w-full" type="text" name="lastName" placeholder="Dela Cruz" :value="old('text')" required />
                    @error('lastName')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    <x-label for="rank" value="{{ __('Rank') }}" />
                    @if ($isOtherRankChecked)
                        <x-input wire:model.blur="rank" id="rank" class="block mt-2 w-full" type="text" name="rank" placeholder="Specify your Rank" :value="old('text')" required />
                    @else
                        <x-input-select wire:model.blur="rank" name="rank" id="rank" class="block mt-2 w-full" required>
                            <option value="">Select a Rank</option>
                            <optgroup label="Deck Officer">
                                <option value="master">Master</option>
                                <option value="chiefOfficer">Chief Officer</option>
                                <option value="secondOfficer">Second Officer</option>
                                <option value="thirdOfficer">Third Officer</option>
                            </optgroup>
                            <optgroup label="Engine Officer">
                                <option value="chiefEngineer">Chief Engineer</option>
                                <option value="secondEngineer">Second Engineer</option>
                                <option value="thirdEngineer">Third Engineer</option>
                                <option value="fourthEngineer">Fourth Engineer</option>
                                <option value="electroTechOfficer">Electro Tech Officer</option>
                                <option value="electroTechRating">Electro Tech Rating</option>
                                <option value="electroAssistant">Electro Assistant</option>
                            </optgroup>
                            <optgroup label="Ratings">
                                <option value="ableBodiedSeaman">Able Bodied Seaman</option>
                                <option value="bosun">Bosun</option>
                                <option value="chiefCook">Chief Cook</option>
                                <option value="fitter">Fitter</option>
                                <option value="messman">Messman</option>
                                <option value="motormanOiler">Motorman / motormanOiler</option>
                                <option value="ordinarySeaman">Ordinary Seaman</option>
                                <option value="wiper">Wiper</option>
                            </optgroup>
                            <optgroup label="Cadet">
                                <option value="deckCadet">Deck Cadet</option>
                                <option value="engineCadet">Engine Cadet</option>
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
                    <x-input wire:model.blur="vessel" id="vessel" class="block mt-2 w-full" type="text" name="vessel" placeholder="Specify your Vessel" :value="old('text')" required />
                    @error('vessel')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="p-6 rounded-lg bg-white border border-gray-200">
            <h2 class="font-poppins text-xl text-primary">Appointment Details</h2>
            <div class="mt-5 space-y-5">
                <div>
                    <x-label for="appointmentTime" value="{{ __('Appointment Time') }}" />
                    <x-input-time wire:model.blur="appointmentTime" id="appointmentTime" name="appointmentTime" class="block mt-2 w-full" required />
                    @error('appointmentTime')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                </div>
                <div>
                    <x-label for="reportingStaff" value="{{ __('Reporting Staff') }}" />
                    @if ($isOtherStaffChecked)
                        <x-input wire:model.blur="reportingStaff" id="reportingStaff" class="block mt-2 w-full" type="text" name="reportingStaff" placeholder="Specify the name of Staff" :value="old('text')" required />
                    @else
                        <x-input-select wire:model.blur="reportingStaff" name="reportingStaff" id="reportingStaff" class="block mt-2 w-full" required>
                            <option value="" @selected(true)>Select a Staff</option>
                            <optgroup label="Person-in-Charge">
                                @foreach ($users as $user)
                                    <option key="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </optgroup>
                            {{-- <optgroup label="Person-in-Charge">
                                <option value="capWillie">Capt. Willie</option>
                                <option value="leicel">Leicel</option>
                                <option value="honeylet">Honeylet</option>
                                <option value="cindy">Cindy</option>
                                <option value="michelle">Michelle</option>
                                <option value="richard">Richard</option>
                                <option value="issa">Issa</option>
                                <option value="arfhel">Arfhel</option>
                                <option value="cecil">Cecil</option>
                                <option value="diosa">Diosa</option>
                            </optgroup>
                            <optgroup label="Department">
                                <option value="accounting">Accounting</option>
                                <option value="hrAdmin">HR &#47; Admin</option>
                                <option value="recruitment">Recruitment</option>
                                <option value="training">Training</option>
                                <option value="documentation">Documentation &lpar;AMOSUP &#47; Visa&rpar;</option>
                            </optgroup> --}}
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
                       <x-input wire:model.blur="purpose" id="purpose" class="block mt-2 w-full" type="text" name="purpose" placeholder="Specify your Purpose" :value="old('text')" required />
                    @else
                        <x-input-select wire:model.blur="purpose" name="purpose" id="purpose" class="block mt-2 w-full" required>
                            <option value="">Select a Purpose</option>
                            <optgroup label="Purpose">
                                <option value="documentationSigning">Documentation &#47; Signing of Contract</option>
                                <option value="dispatch">Dispatch</option>
                                <option value="visaApplicationProcessing">Visa Application &#47; Processing</option>
                                <option value="requestSeaService">Request for Sea Service</option>
                                <option value="antiPiracy">Anti-Piracy</option>
                                <option value="followup">Follow up for Line up</option>
                                <option value="disembarkationReport">Disembarkation Report</option>
                                <option value="amosup">AMOSUP</option>
                                <option value="accountingMatters">Accounting Matters</option>
                                <option value="trainingMatters">Training Matters</option>
                                <option value="pandimatters">P&amp;I Matters</option>
                                <option value="apply">Apply</option>
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