<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- Replace with restaurant logo -->
            <img src="{{ asset('images/restaurant-logo.png') }}" alt="Restaurant Logo" class="w-24 h-24 mx-auto rounded-full">
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-medium" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-medium" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <x-checkbox id="remember_me" name="remember" />
                <label for="remember_me" class="ml-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Submit / Forgot -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-amber-600 hover:text-amber-800 underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <!-- Optional Sign Up Link -->
        <p class="mt-6 text-center text-sm text-gray-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-amber-600 hover:text-amber-800 underline">Sign up</a>
        </p>
    </x-authentication-card>
</x-guest-layout>
