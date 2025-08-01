<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="mt-2">
                <label class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-900">
                    <input type="checkbox" id="showPassword" class="form-checkbox">
                    <span>Show Password</span>
                </label>
            </div>
        </div>

    

        <div class="flex items-center justify-center mt-4">


            <x-primary-button class="ml-3 items-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('showPassword');
            const passwordField = document.getElementById('password');

            checkbox.addEventListener('change', function () {
                passwordField.type = this.checked ? 'text' : 'password';
            });
        });
    </script>
</x-guest-layout>
