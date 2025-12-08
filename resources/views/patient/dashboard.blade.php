<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gm-text leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="gm-card p-6">
                <div class="text-sm text-gm-muted">Welcome</div>
                <div class="text-2xl font-semibold text-gm-text">
                    {{ Auth::user()->name }}
                </div>
                <div class="mt-2 text-sm text-gm-muted">
                    This is your care hub. You’ll be able to book appointments and view records here next.
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Upcoming Appointments</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Prescriptions</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
                <div class="gm-card-muted p-5">
                    <div class="text-sm text-gm-muted">Medical Records</div>
                    <div class="mt-2 text-3xl font-semibold text-gm-text">0</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
