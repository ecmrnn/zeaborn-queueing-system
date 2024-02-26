<x-guest-layout>
    <x-authentication-card>
        <div class="px-6 py-12">
            <x-slot name="logo">
                {{-- <x-authentication-card-logo /> --}}
            </x-slot>
            <x-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <hgroup class="mb-10">
                <h1 class="font-poppins text-2xl text-primary">Zeaborn, hello?</h1>
                <p class="opacity-25 text-xs">Mema Queueing System</p>
            </hgroup>
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div class="space-y-5">
                    <div class="mt-2">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-2 w-full" type="email" name="email" placeholder="juan.delacruz@gmail.com" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-2 w-full" type="password" name="password" placeholder="********" required autocomplete="current-password" />
                    </div>
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-button class="w-full">
                            {{ __('Login') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
