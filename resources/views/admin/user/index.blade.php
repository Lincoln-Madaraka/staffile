<x-admin-layout
    title="Users"
    subtitle="Manage admins, doctors, and patients."
>
    <x-slot name="actions">
        <a href="{{ route('admin.users.create') }}" class="gm-btn text-xs">
            Add User
        </a>
    </x-slot>

    <div class="space-y-4">
        <x-session-message />

        <div class="flex items-center gap-2">
            <span class="gm-badge">Users Records</span>
            <span class="text-sm text-gm-muted">
                Total shown: {{ method_exists($users, 'count') ? $users->count() : 0 }}
            </span>
        </div>

        <div class="overflow-auto">
            <table class="gm-table">
                <thead>
                    <tr>
                        <th class="w-20">ID</th>
                        <th>Name</th>
                        <th class="w-40">Role</th>
                        <th class="w-64">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="hover:bg-gm-surface2/60">
                            <td>{{ $user->id }}</td>
                            <td class="font-medium">
                                {{ $user->name }}
                            </td>
                            <td>
                                <span class="gm-badge">
                                    {{ $user->role?->name ?? 'unassigned' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center gap-2">
                                    <x-secondary-button
                                        type="button"
                                        onclick="location.href='{{ route('admin.users.edit', $user->id) }}';"
                                    >
                                        Edit
                                    </x-secondary-button>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                        onsubmit="return confirm('Are you sure?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <x-danger-button type="submit">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-10 text-center text-gm-muted">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (method_exists($users, 'links'))
            <div class="pt-2">
                {!! $users->links() !!}
            </div>
        @endif
    </div>
</x-admin-layout>
