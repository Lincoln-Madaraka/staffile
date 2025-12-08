<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gm-text leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="gm-card p-6">
                <div class="text-sm text-gm-muted">Welcome, Dr.</div>
                <div class="text-2xl font-semibold text-gm-text">
                    {{ Auth::user()->name }}
                </div>
                <div class="mt-2 text-sm text-gm-muted">
                    This is your clinical workspace. Appointments and patient records will appear here next.
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Today’s Appointments</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Pending Notes</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Patients Assigned</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
