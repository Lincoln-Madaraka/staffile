<x-admin-layout
    title="Add User"
    subtitle="Create an admin, doctor, or patient account."
>
    <x-slot name="actions">
        <a href="{{ route('admin.users.index') }}">
            <x-secondary-button type="button">
                Back to Users
            </x-secondary-button>
        </a>
    </x-slot>

    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
        @csrf

        <div class="grid gap-5 md:grid-cols-2">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="block mt-1 w-full"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block mt-1 w-full"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Password Confirmation -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Password Confirmation')" />
                <x-text-input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="block mt-1 w-full"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="md:col-span-2">
                <x-input-label for="role_id" :value="__('Role')" />

                <select
                    id="role_id"
                    name="role_id"
                    class="block mt-1 w-full rounded-lg border border-gm-border bg-gm-surface text-gm-text
                           focus:border-gm-primary focus:ring focus:ring-gm-primary/30 transition"
                    required
                >
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-2">
            <x-primary-button>
                {{ __('Add User') }}
            </x-primary-button>

            <a href="{{ route('admin.users.index') }}">
                <x-secondary-button type="button">
                    Cancel
                </x-secondary-button>
            </a>
        </div>
    </form>
</x-admin-layout>
