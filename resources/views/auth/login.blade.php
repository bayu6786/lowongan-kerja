<x-guest-layout>
    <!-- Session Status Display -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address Field -->
        <div class="space-y-2">
            <x-input-label 
                for="email" 
                :value="__('Email')" />
            
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="{{ __('Enter your email address') }}" />
            
            <x-input-error 
                :messages="$errors->get('email')" 
                class="mt-2" />
        </div>

        <!-- Password Field -->
        <div class="space-y-2">
            <x-input-label 
                for="password" 
                :value="__('Password')" />

            <x-text-input 
                id="password" 
                class="block mt-1 w-full"
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="{{ __('Enter your password') }}" />

            <x-input-error 
                :messages="$errors->get('password')" 
                class="mt-2" />
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-0 transition duration-150 ease-in-out" 
                    name="remember">
                
                <span class="ms-2 text-sm text-gray-600 select-none">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-4">
            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <a 
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out" 
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @else
                <!-- Empty div to maintain layout when forgot password is not available -->
                <div></div>
            @endif

            <!-- Login Button -->
            <x-primary-button class="ml-3 px-6 py-2">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register Link (Optional) -->
        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a 
                        href="{{ route('register') }}" 
                        class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                        {{ __('Sign up here') }}
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>