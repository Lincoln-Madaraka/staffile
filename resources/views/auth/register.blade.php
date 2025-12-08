<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Title -->
        <div class="text-center mb-2">
            <h1 class="text-2xl font-semibold text-gm-text">Create your account</h1>
            <p class="text-sm text-gm-muted mt-1">Join {{ config('app.name', 'GiftMed') }} to get started.</p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="gm-label" />
            <x-text-input
                id="name"
                class="gm-input block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="gm-label" />
            <x-text-input
                id="password_confirmation"
                class="gm-input block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between pt-2">
            <a
                class="text-sm text-gm-muted hover:text-gm-text transition-colors"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="gm-btn">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
