<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Title -->
        <div class="text-center mb-2">
            <h1 class="text-2xl font-semibold text-gm-text">Welcome back</h1>
            <p class="text-sm text-gm-muted mt-1">Sign in to continue to {{ config('app.name', 'GiftMed') }}.</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="gm-label" />
            <x-text-input
                id="email"
                class="gm-input block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="gm-label" />

            <x-text-input
                id="password"
                class="gm-input block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Show Password -->
            <div class="mt-3">
                <label class="flex items-center gap-2 text-sm text-gm-muted">
                    <input
                        type="checkbox"
                        id="showPassword"
                        class="rounded border-gm-border bg-gm-surface text-gm-primary focus:ring-gm-primary/30"
                    >
                    <span>Show Password</span>
                </label>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-center pt-2">
            <x-primary-button class="gm-btn w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('showPassword');
            const passwordField = document.getElementById('password');

            if (checkbox && passwordField) {
                checkbox.addEventListener('change', function () {
                    passwordField.type = this.checked ? 'text' : 'password';
                });
            }
        });
    </script>
</x-guest-layout>
