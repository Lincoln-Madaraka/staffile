<x-admin-layout
    title="Edit User Role"
    subtitle="Update the role assigned to this account."
>
    <x-slot name="actions">
        <a href="{{ route('admin.users.index') }}">
            <x-secondary-button type="button">
                Back to Users
            </x-secondary-button>
        </a>
    </x-slot>

    <div class="space-y-6">
        <!-- Quick User Summary -->
        <div class="gm-card-muted p-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div>
                    <div class="text-xs text-gm-muted">User</div>
                    <div class="text-lg font-semibold text-gm-text">
                        {{ $user->name }}
                    </div>
                    <div class="text-sm text-gm-muted">
                        {{ $user->email }}
                    </div>
                </div>

                <div>
                    <span class="gm-badge">
                        Current: {{ $user->role?->name ?? 'unassigned' }}
                    </span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="max-w-xl">
                <x-input-label for="role_id" :value="__('Role')" />

                <select
                    id="role_id"
                    name="role_id"
                    class="block mt-1 w-full rounded-lg border border-gm-border bg-gm-surface text-gm-text
                           focus:border-gm-primary focus:ring focus:ring-gm-primary/30 transition"
                    required
                >
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <div class="flex items-center gap-2">
                <x-primary-button>
                    {{ __('Update Role') }}
                </x-primary-button>

                <a href="{{ route('admin.users.index') }}">
                    <x-secondary-button type="button">
                        Cancel
                    </x-secondary-button>
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
