<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- Replace with your restaurant logo -->
            <img src="{{ asset('images/restaurant-logo.png') }}" alt="Restaurant Logo" class="w-24 h-24 mx-auto rounded-full">
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-label for="name" value="{{ __('Name') }}" class="text-gray-700 font-medium" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-medium" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-medium" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700 font-medium" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Role Selection -->
            <div class="mb-4">
                <x-label for="role" value="{{ __('Register as') }}" class="text-gray-700 font-medium" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400" required>
                    <option value="">-- Select Role --</option>
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                    <option value="restaurateur" {{ old('role') == 'restaurateur' ? 'selected' : '' }}>Restaurateur</option>
                </select>
            </div>

            <!-- Terms & Privacy Policy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2 text-sm text-gray-600">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-amber-600 hover:text-amber-800 rounded-md">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-amber-600 hover:text-amber-800 rounded-md">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Submit / Already registered -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-amber-600 hover:text-amber-800 underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
