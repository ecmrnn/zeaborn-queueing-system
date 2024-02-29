<nav x-data="{ open: false }" class="max-h-screen bg-white border-b border-gray-200 xl:border-r xl:border-gray-200 sticky top-0 z-40">
    <!-- Primary Navigation Menu -->
    <div class="xl:h-full flex items-center justify-between xl:border-0 ">
        <div class="xl:h-full flex flex-col">
            <!-- Logo -->
            <div class="py-3 px-6 xl:py-6 flex flex-col items-center xl:border-b border-gray-200">
                <a wire:navigate href="{{ route('dashboard') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
                <p class="hidden xl:block text-center opacity-50 text-xs">Queueing System</p>
            </div>

            <!-- Navigation Links -->
            <div class="p-5 hidden xl:flex xl:flex-col xl:justify-between xl:flex-grow">
                <div class="xl:space-y-1">
                    {{-- Main Menu --}}
                    <p class="ps-3 pe-4 py-2 text-primary text-sm">Main Menu</p>
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M215.736-528Q186-528 165-549.5 144-571 144-600v-144q0-29.7 21.176-50.85Q186.352-816 216.088-816h144.176Q390-816 411-794.85q21 21.15 21 50.85v144q0 29-21.176 50.5T359.912-528H215.736Zm0 384Q186-144 165-165.176q-21-21.176-21-50.912v-144.176Q144-390 165.176-411q21.176-21 50.912-21h144.176Q390-432 411-410.824q21 21.176 21 50.912v144.176Q432-186 410.824-165q-21.176 21-50.912 21H215.736ZM600-528q-29 0-50.5-21.5T528-600v-144q0-29.7 21.5-50.85Q571-816 600-816h144q29.7 0 50.85 21.15Q816-773.7 816-744v144q0 29-21.15 50.5T744-528H600Zm0 384q-29 0-50.5-21.176T528-216.088v-144.176Q528-390 549.5-411q21.5-21 50.5-21h144q29.7 0 50.85 21.176Q816-389.648 816-359.912v144.176Q816-186 794.85-165 773.7-144 744-144H600ZM216-600h144v-144H216v144Zm384 0h144v-144H600v144Zm0 384h144v-144H600v144Zm-384 0h144v-144H216v144Zm384-384Zm0 240Zm-240 0Zm0-240Z"/></svg>
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('appointments')" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M396-816q-15.3 0-25.65-10.289-10.35-10.29-10.35-25.5Q360-867 370.35-877.5 380.7-888 396-888h168q15.3 0 25.65 10.289 10.35 10.29 10.35 25.5Q600-837 589.65-826.5 579.3-816 564-816H396Zm83.789 432Q495-384 505.5-394.35 516-404.7 516-420v-168q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q465-624 454.5-613.65 444-603.3 444-588v168q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35ZM480-96q-70 0-130.92-26.507-60.919-26.507-106.493-72.08-45.573-45.574-72.08-106.493Q144-362 144-432q0-70 26.507-130.92 26.507-60.919 72.08-106.493 45.574-45.573 106.493-72.08Q410-768 479.56-768q58.28 0 111.86 19.5T691-694l27.282-27.282Q729-732 743-731.5t25 11.5q11 11 11 25t-11 25l-26 27q35 45 54.5 98.808Q816-490.384 816-431.856 816-362 789.493-301.08q-26.507 60.919-72.08 106.493-45.574 45.573-106.493 72.08Q550-96 480-96Zm0-72q110 0 187-77t77-187q0-110-77-187t-187-77q-110 0-187 77t-77 187q0 110 77 187t187 77Zm0-264Z"/></svg>
                        {{ __('Appointments') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('appointments')" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M240-240h240v-23q0-17.63-9.5-32.667Q461-310.704 444-319q-20-8-40.5-12.5T360-336q-23 0-43.5 4.5T276-318.529Q259-311 249.5-295.87 240-280.739 240-263v23Zm372-48h72q15 0 25.5-10.5T720-324q0-15-10.5-25.5T684-360h-72q-15 0-25.5 10.5T576-324q0 15 10.5 25.5T612-288Zm-252-72q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm252-48h72q15 0 25.5-10.5T720-444q0-15-10.5-25.5T684-480h-72q-15 0-25.5 10.5T576-444q0 15 10.5 25.5T612-408ZM168-96q-29.7 0-50.85-21.15Q96-138.3 96-168v-432q0-29.7 21.15-50.85Q138.3-672 168-672h216v-120q0-29.7 21.15-50.85Q426.3-864 456-864h48q29.7 0 50.85 21.15Q576-821.7 576-792v120h216q29.7 0 50.85 21.15Q864-629.7 864-600v432q0 29.7-21.15 50.85Q821.7-96 792-96H168Zm0-72h624v-432H576q0 30-21.15 51T504-528h-48q-29.7 0-50.85-21.15Q384-570.3 384-600H168v432Zm288-432h48v-192h-48v192Zm24 216Z"/></svg>
                        {{ __('Persons in Charge') }}
                    </x-responsive-nav-link>
                    
                    {{-- Account Management --}}
                    <p class="ps-3 pe-4 py-2 text-primary text-sm">Account Settings</p>
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.675-91.23-220.838Q609.541-792 479.77-792 350-792 259-700.838 168-609.675 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.276 312Q401-96 331-126q-70-30-122.5-82.5T126-330.958q-30-69.959-30-149.5Q96-560 126-629.5t82.5-122Q261-804 330.958-834q69.959-30 149.5-30Q560-864 629.5-834t122 82.5Q804-699 834-629.276q30 69.725 30 149Q864-401 834-331q-30 70-82.5 122.5T629.276-126q-69.725 30-149 30ZM480-168q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                </div>
                <div>
                    {{-- Signout --}}
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-button class="w-full">{{ __('Sign out') }} </x-button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Hamburger -->
        <div class="me-3 flex items-center xl:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 border border-transparent hover:border-gray-200 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 focus:border-gray-200 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden xl:hidden border-t border-gray-200">
        <div class="pt-2 pb-3 space-y-1">

            {{-- Main Menu --}}
            <p class="ps-3 pe-4 py-2 text-primary text-sm">Main Menu</p>
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M215.736-528Q186-528 165-549.5 144-571 144-600v-144q0-29.7 21.176-50.85Q186.352-816 216.088-816h144.176Q390-816 411-794.85q21 21.15 21 50.85v144q0 29-21.176 50.5T359.912-528H215.736Zm0 384Q186-144 165-165.176q-21-21.176-21-50.912v-144.176Q144-390 165.176-411q21.176-21 50.912-21h144.176Q390-432 411-410.824q21 21.176 21 50.912v144.176Q432-186 410.824-165q-21.176 21-50.912 21H215.736ZM600-528q-29 0-50.5-21.5T528-600v-144q0-29.7 21.5-50.85Q571-816 600-816h144q29.7 0 50.85 21.15Q816-773.7 816-744v144q0 29-21.15 50.5T744-528H600Zm0 384q-29 0-50.5-21.176T528-216.088v-144.176Q528-390 549.5-411q21.5-21 50.5-21h144q29.7 0 50.85 21.176Q816-389.648 816-359.912v144.176Q816-186 794.85-165 773.7-144 744-144H600ZM216-600h144v-144H216v144Zm384 0h144v-144H600v144Zm0 384h144v-144H600v144Zm-384 0h144v-144H216v144Zm384-384Zm0 240Zm-240 0Zm0-240Z"/></svg>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('appointments')" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M396-816q-15.3 0-25.65-10.289-10.35-10.29-10.35-25.5Q360-867 370.35-877.5 380.7-888 396-888h168q15.3 0 25.65 10.289 10.35 10.29 10.35 25.5Q600-837 589.65-826.5 579.3-816 564-816H396Zm83.789 432Q495-384 505.5-394.35 516-404.7 516-420v-168q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q465-624 454.5-613.65 444-603.3 444-588v168q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35ZM480-96q-70 0-130.92-26.507-60.919-26.507-106.493-72.08-45.573-45.574-72.08-106.493Q144-362 144-432q0-70 26.507-130.92 26.507-60.919 72.08-106.493 45.574-45.573 106.493-72.08Q410-768 479.56-768q58.28 0 111.86 19.5T691-694l27.282-27.282Q729-732 743-731.5t25 11.5q11 11 11 25t-11 25l-26 27q35 45 54.5 98.808Q816-490.384 816-431.856 816-362 789.493-301.08q-26.507 60.919-72.08 106.493-45.574 45.573-106.493 72.08Q550-96 480-96Zm0-72q110 0 187-77t77-187q0-110-77-187t-187-77q-110 0-187 77t-77 187q0 110 77 187t187 77Zm0-264Z"/></svg>
                {{ __('Appointments') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('appointments')" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M240-240h240v-23q0-17.63-9.5-32.667Q461-310.704 444-319q-20-8-40.5-12.5T360-336q-23 0-43.5 4.5T276-318.529Q259-311 249.5-295.87 240-280.739 240-263v23Zm372-48h72q15 0 25.5-10.5T720-324q0-15-10.5-25.5T684-360h-72q-15 0-25.5 10.5T576-324q0 15 10.5 25.5T612-288Zm-252-72q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm252-48h72q15 0 25.5-10.5T720-444q0-15-10.5-25.5T684-480h-72q-15 0-25.5 10.5T576-444q0 15 10.5 25.5T612-408ZM168-96q-29.7 0-50.85-21.15Q96-138.3 96-168v-432q0-29.7 21.15-50.85Q138.3-672 168-672h216v-120q0-29.7 21.15-50.85Q426.3-864 456-864h48q29.7 0 50.85 21.15Q576-821.7 576-792v120h216q29.7 0 50.85 21.15Q864-629.7 864-600v432q0 29.7-21.15 50.85Q821.7-96 792-96H168Zm0-72h624v-432H576q0 30-21.15 51T504-528h-48q-29.7 0-50.85-21.15Q384-570.3 384-600H168v432Zm288-432h48v-192h-48v192Zm24 216Z"/></svg>
                {{ __('Persons in Charge') }}
            </x-responsive-nav-link>
            
            {{-- Account Management --}}
            <p class="ps-3 pe-4 py-2 text-primary text-sm">Account Settings</p>
            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.675-91.23-220.838Q609.541-792 479.77-792 350-792 259-700.838 168-609.675 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.276 312Q401-96 331-126q-70-30-122.5-82.5T126-330.958q-30-69.959-30-149.5Q96-560 126-629.5t82.5-122Q261-804 330.958-834q69.959-30 149.5-30Q560-864 629.5-834t122 82.5Q804-699 834-629.276q30 69.725 30 149Q864-401 834-331q-30 70-82.5 122.5T629.276-126q-69.725 30-149 30ZM480-168q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg>
                {{ __('Profile') }}
            </x-responsive-nav-link>
            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 capitalize">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();"
                        class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h264v72H216v528h264v72H216Zm432-168-51-51 81-81H384v-72h294l-81-81 51-51 168 168-168 168Z"/></svg>
                        {{ __('Sign out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
