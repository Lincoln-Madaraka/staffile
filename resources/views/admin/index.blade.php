@extends('admin.layouts.admin')

@section('content')
    <div class="space-y-6">
        <div>
            <div class="text-xs text-gm-muted">Overview</div>
            <h1 class="text-2xl font-semibold tracking-tight">
                Admin Dashboard
            </h1>
            <p class="text-sm text-gm-muted mt-1">
                Quick system snapshot (GiftMed core).
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="gm-card-muted p-5">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gm-muted">Users</div>
                    <span class="gm-badge">Total</span>
                </div>
                <div class="mt-3 text-4xl font-semibold tracking-tight text-gm-text">
                    {{ $users ?? 0 }}
                </div>
                <div class="mt-2 text-xs text-gm-muted">
                    Admins, doctors, and patients combined.
                </div>
            </div>

            <div class="gm-card-muted p-5">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gm-muted">Doctors</div>
                    <span class="gm-badge">Next</span>
                </div>
                <div class="mt-3 text-4xl font-semibold tracking-tight text-gm-text">
                    0
                </div>
                <div class="mt-2 text-xs text-gm-muted">
                    Will populate once doctor module is wired.
                </div>
            </div>

            <div class="gm-card-muted p-5">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gm-muted">Appointments</div>
                    <span class="gm-badge">Next</span>
                </div>
                <div class="mt-3 text-4xl font-semibold tracking-tight text-gm-text">
                    0
                </div>
                <div class="mt-2 text-xs text-gm-muted">
                    Booking system comes in the appointments phase.
                </div>
            </div>
        </div>
    </div>
@endsection
